const SUPABASE_URL = 'https://ggfdzrkrbghwvequzorv.supabase.co';
const SUPABASE_ANON_KEY = 'sb_publishable_rNIcT3N-zpgBkqyFAePbYw_y1KyDGkq';

window.supabaseClient = window.supabase.createClient(SUPABASE_URL, SUPABASE_ANON_KEY);
console.log('Supabase connected!');
