/**
 * Floating elements animation for MoneyMind login page
 * Creates floating financial icons that move across the screen
 */
document.addEventListener('DOMContentLoaded', function() {
    // Only run on login page
    if (!document.querySelector('.login-container')) return;
    
    // Create container for floating elements
    const container = document.createElement('div');
    container.className = 'floating-elements-container';
    container.style.cssText = `
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        pointer-events: none;
        z-index: 0;
    `;
    document.querySelector('.login-container').appendChild(container);
    
    // Financial icons to float (using emoji for simplicity)
    const icons = ['💰', '💵', '💴', '💶', '💷', '📊', '📈', '💹', '🏦', '💳', '💲', '💱'];
    
    // Create floating elements
    const createFloatingElement = () => {
        const element = document.createElement('div');
        const icon = icons[Math.floor(Math.random() * icons.length)];
        const size = Math.random() * 20 + 10; // 10-30px
        const startPositionX = Math.random() * 100; // 0-100%
        const startPositionY = Math.random() * 100; // 0-100%
        const duration = Math.random() * 15 + 10; // 10-25s
        const delay = Math.random() * 5; // 0-5s
        
        element.innerHTML = icon;
        element.style.cssText = `
            position: absolute;
            font-size: ${size}px;
            left: ${startPositionX}%;
            top: ${startPositionY}%;
            opacity: ${Math.random() * 0.6 + 0.1}; /* 0.1-0.7 */
            animation: float ${duration}s ease-in-out ${delay}s infinite;
            filter: blur(${Math.random() * 2}px);
        `;
        
        return element;
    };
    
    // Add floating elements
    for (let i = 0; i < 15; i++) {
        container.appendChild(createFloatingElement());
    }
    
    // Add CSS for animations if not already present
    if (!document.getElementById('floating-elements-style')) {
        const style = document.createElement('style');
        style.id = 'floating-elements-style';
        style.textContent = `
            @keyframes float {
                0% {
                    transform: translate(0, 0) rotate(0deg);
                }
                25% {
                    transform: translate(100px, 50px) rotate(10deg);
                }
                50% {
                    transform: translate(200px, 0) rotate(0deg);
                }
                75% {
                    transform: translate(100px, -50px) rotate(-10deg);
                }
                100% {
                    transform: translate(0, 0) rotate(0deg);
                }
            }
        `;
        document.head.appendChild(style);
    }
});
