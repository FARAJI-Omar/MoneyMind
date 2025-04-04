/**
 * Typing animation for welcome message on MoneyMind login page
 */
document.addEventListener('DOMContentLoaded', function() {
    // Only run this on the login page
    const welcomeHeading = document.querySelector('.welcome-heading');
    if (!welcomeHeading) return;

    try {
        const originalText = welcomeHeading.textContent;
        welcomeHeading.textContent = '';
        welcomeHeading.style.visibility = 'visible';

        // Add cursor element
        const cursor = document.createElement('span');
        cursor.className = 'typing-cursor';
        cursor.innerHTML = '|';
        cursor.style.cssText = `
            animation: blink 1s step-end infinite;
            font-weight: 300;
            color: #00bbf0;
        `;
        welcomeHeading.appendChild(cursor);

        // Add cursor animation style
        const style = document.createElement('style');
        style.textContent = `
            @keyframes blink {
                from, to { opacity: 1; }
                50% { opacity: 0; }
            }
        `;
        document.head.appendChild(style);

        // Type out the text
        let i = 0;
        const typeText = () => {
            if (i < originalText.length) {
                const textNode = document.createTextNode(originalText.charAt(i));
                welcomeHeading.insertBefore(textNode, cursor);
                i++;
                setTimeout(typeText, 100); // Adjust typing speed here
            }
        };

        // Start typing after a short delay
        setTimeout(typeText, 500);
    } catch (error) {
        // If there's any error, make sure the heading is visible
        console.error('Error in typing animation:', error);
        welcomeHeading.style.visibility = 'visible';
        welcomeHeading.textContent = welcomeHeading.getAttribute('data-original-text') || 'Welcome Back to MoneyMind';
    }
});
