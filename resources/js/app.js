import './bootstrap';

import FontPicker from "font-picker";

const fontPicker = new FontPicker(
    'AIzaSyD9CiG1x-3PWdxdF5PITs14b5tp8yVpZMs', // Google API key
    "Nunito", // Default font
    { limit: 300 }, // Additional options
);

/**
 * Calculate font size and textarea height automagically
 */
window.calculateSizeAndHeight = function (textBox, textLength, shortTextLimit, minFontSize, maxFontSize, coefficient, defaultFontSize) {
    let fontSize, textBoxHeight;

    if (textLength > shortTextLimit) {
        const relativeLength = textLength - shortTextLimit;
        fontSize = Math.max(minFontSize, Math.min(maxFontSize, maxFontSize - relativeLength * coefficient));
        textBoxHeight = `${textBox.scrollHeight}px`;
    } else if (textLength === 0) {
        fontSize = defaultFontSize;
        textBoxHeight = 'auto';
    } else {
        fontSize = maxFontSize;
        textBoxHeight = `${textBox.scrollHeight}px`;
    }

    return { fontSize, textBoxHeight };
}
