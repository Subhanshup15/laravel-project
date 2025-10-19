    import axios from 'axios';

window.axios = axios;

// Automatically add CSRF token to all requests
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
