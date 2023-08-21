import './bootstrap';

import FontPicker from "font-picker";

const fontPicker = new FontPicker(
    'AIzaSyD9CiG1x-3PWdxdF5PITs14b5tp8yVpZMs', // Google API key
    "Nunito", // Default font
    { limit: 300 }, // Additional options
);

// document.addEventListener('livewire:initialized', () => {
//     const text = document.querySelector(".text-autoresize");
//     const numWords = text.textContent.trim().split(" ").length;
//
//     const minFontSize = 20;
//     const maxFontSize = 36;
//     const coefficient = 0.8;
//
//     const fontSize = Math.max(minFontSize, Math.min(maxFontSize, numWords * coefficient));
//     text.style.fontSize = fontSize + "px";
// });
