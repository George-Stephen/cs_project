import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import {
    Collapse,
    Dropdown,
    initTE,
    Carousel,
    Ripple,
    Input
} from "tw-elements";


window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();

initTE({ Collapse, Dropdown, Carousel, Ripple, Input });

// Initialization for ES Users