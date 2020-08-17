import 'alpinejs';
import animate from 'animateplus';
import 'typeface-inter';
import 'typeface-lexend-deca';

animate({
    elements: '.animate-entry',
    duration: 1000,
    delay: index => index * 100,
    transform: ['scale(0)', 'scale(1)'],
});
