define([
    'jquery',
    'owlCarousel'
], function($) {
    return function(config, element) {
       $('.owl-carousel').owlCarousel();
    };
});