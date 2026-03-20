const SUPABASE_URL = 'https://ggfdzrkrbghwvequzorv.supabase.co';  // GANTI INI
const SUPABASE_ANON_KEY = 'sb_publishable_rNIcT3N-zpgBkqyFAePbYw_y1KyDGkq';  // GANTI INI

window.supabaseClient = window.supabase.createClient(SUPABASE_URL, SUPABASE_ANON_KEY);


console.log('Supabase connected!');
