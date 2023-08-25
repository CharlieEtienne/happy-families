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
window.calculateSizeAndHeight = (textBox, textLength, shortTextLimit, minFontSize, maxFontSize, coefficient, defaultFontSize) => {
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
};

/**
 * Make a fixed div float when next to footer
 * @param {HTMLElement} floatingElement
 * @param {HTMLElement} footerElement
 * @param {int} offset
 */
window.makeItFloat = (floatingElement, footerElement, offset = 10) => {

    if ( !floatingElement || !footerElement ){
        console.log("Invalid or missing method parameters in makeItFloat method");
        return;
    }
    const getRectTop   = el => {
        const rect = el.getBoundingClientRect();
        return rect.top;
    };
    const getScrollTop = () => document.body.scrollTop;

    if((getRectTop(floatingElement) + getScrollTop()) + floatingElement.offsetHeight >= (getRectTop(footerElement) + getScrollTop()) - offset)
        floatingElement.style.position = 'absolute';
    if(getScrollTop() + window.innerHeight < (getRectTop(footerElement) + getScrollTop()))
        floatingElement.style.position = 'fixed'; // restore when you scroll up

};
