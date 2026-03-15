from flask import Flask, jsonify, request, send_from_directory
import os
import json

app = Flask(__name__, static_folder='.')

DATA_FILE = 'students.json'

if not os.path.exists(DATA_FILE):
    with open(DATA_FILE, 'w', encoding='utf-8') as f:
        json.dump([], f)


def load_students():
    with open(DATA_FILE, 'r', encoding='utf-8') as f:
        return json.load(f)


def save_students(students):
    with open(DATA_FILE, 'w', encoding='utf-8') as f:
        json.dump(students, f, ensure_ascii=False, indent=2)


@app.route('/')
def index():
    return send_from_directory('.', 'index.html')


@app.route('/<path:path>')
def static_files(path):
    # Normalize path and support clean URLs without .html
    if path.endswith('/'):
        path = path[:-1]

    if path in ('', 'index'):
        return send_from_directory('.', 'index.html')

    # route clean page path ke index dengan section in-page saat content pada index ada
    section_paths = {'profil', 'galery', 'tentang', 'hubungi'}
    if path in section_paths:
        return send_from_directory('.', 'index.html')

    # map clean path to separate HTML if available
    if not os.path.splitext(path)[1]:
        candidate = f'{path}.html'
        if os.path.exists(candidate):
            return send_from_directory('.', candidate)

    # static assets and explicit file path
    if os.path.exists(path):
        return send_from_directory('.', path)

    # fallback to index for unknown route
    return send_from_directory('.', 'index.html')


@app.route('/api/students', methods=['GET'])
def get_students():
    students = load_students()
    role = request.args.get('role', '').strip().lower()
    search = request.args.get('search', '').strip().lower()

    if role:
        students = [s for s in students if s.get('role', '').strip().lower() == role]

    if search:
        students = [s for s in students if search in s.get('name', '').strip().lower() or search in s.get('dream', '').strip().lower() or search in s.get('social', '').strip().lower()]

    return jsonify(students)


@app.route('/api/students/stats', methods=['GET'])
def students_stats():
    students = load_students()
    stats = {
        'total': len(students),
        'by_role': {},
    }

    for s in students:
        r = s.get('role', 'Unknown').strip() or 'Unknown'
        stats['by_role'][r] = stats['by_role'].get(r, 0) + 1

    return jsonify(stats)


@app.route('/api/students', methods=['POST'])
def add_student():
    data = request.json
    if not data:
        return jsonify({'error': 'Data tidak ditemukan'}), 400

    required = ['name', 'role', 'social', 'dream', 'photo']
    for field in required:
        if field not in data or not data[field]:
            return jsonify({'error': f'{field} wajib diisi'}), 400

    students = load_students()
    student_id = len(students) + 1
    student = {
        'id': student_id,
        'name': data['name'],
        'role': data['role'],
        'social': data['social'],
        'dream': data['dream'],
        'photo': data['photo']
    }
    students.append(student)
    save_students(students)
    return jsonify(student), 201


if __name__ == '__main__':
    app.run(debug=True, port=5000)
