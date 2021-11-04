require('./bootstrap');

import Alpine from 'alpinejs';
import 'animate.css';
import { createPopper } from '@popperjs/core';

window.Alpine = Alpine;
window.Swal = require('sweetalert2');

Alpine.start();
