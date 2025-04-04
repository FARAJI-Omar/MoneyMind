/**
 * Admin dashboard particles animation for MoneyMind
 * Creates floating financial symbols and particles in the background
 */
class AdminParticle {
    constructor(canvas, options = {}) {
        this.canvas = canvas;
        this.ctx = canvas.getContext('2d');
        this.width = canvas.width;
        this.height = canvas.height;
        
        // Default options
        this.options = {
            particleCount: options.particleCount || 40,
            particleColor: options.particleColor || '#00bbf0',
            lineColor: options.lineColor || 'rgba(0, 187, 240, 0.2)',
            particleRadius: options.particleRadius || 3,
            lineWidth: options.lineWidth || 1,
            maxSpeed: options.maxSpeed || 0.5,
            symbols: options.symbols || ['$', '€', '£', '¥', '₹', '₽', '฿', '₴', '₺', '₩'],
            symbolFrequency: options.symbolFrequency || 0.2, // 20% of particles will be symbols
            symbolColor: options.symbolColor || '#ffffff',
            symbolSize: options.symbolSize || 16
        };
        
        this.particles = [];
        this.init();
        this.animate();
    }
    
    init() {
        // Create particles
        for (let i = 0; i < this.options.particleCount; i++) {
            const isSymbol = Math.random() < this.options.symbolFrequency;
            const symbol = isSymbol ? this.options.symbols[Math.floor(Math.random() * this.options.symbols.length)] : null;
            
            this.particles.push({
                x: Math.random() * this.width,
                y: Math.random() * this.height,
                radius: isSymbol ? 0 : (Math.random() * this.options.particleRadius + 1),
                symbol: symbol,
                vx: Math.random() * this.options.maxSpeed * 2 - this.options.maxSpeed,
                vy: Math.random() * this.options.maxSpeed * 2 - this.options.maxSpeed,
                opacity: Math.random() * 0.5 + 0.3
            });
        }
    }
    
    draw() {
        this.ctx.clearRect(0, 0, this.width, this.height);
        
        // Draw connections
        this.ctx.beginPath();
        for (let i = 0; i < this.particles.length; i++) {
            for (let j = i + 1; j < this.particles.length; j++) {
                const p1 = this.particles[i];
                const p2 = this.particles[j];
                const distance = Math.sqrt(Math.pow(p1.x - p2.x, 2) + Math.pow(p1.y - p2.y, 2));
                
                if (distance < 100) {
                    this.ctx.strokeStyle = this.options.lineColor;
                    this.ctx.lineWidth = this.options.lineWidth;
                    this.ctx.globalAlpha = 1 - (distance / 100);
                    this.ctx.moveTo(p1.x, p1.y);
                    this.ctx.lineTo(p2.x, p2.y);
                }
            }
        }
        this.ctx.stroke();
        
        // Draw particles
        for (let i = 0; i < this.particles.length; i++) {
            const p = this.particles[i];
            
            if (p.symbol) {
                // Draw symbol
                this.ctx.font = `${this.options.symbolSize}px Arial`;
                this.ctx.fillStyle = this.options.symbolColor;
                this.ctx.globalAlpha = p.opacity;
                this.ctx.fillText(p.symbol, p.x, p.y);
            } else {
                // Draw circle
                this.ctx.beginPath();
                this.ctx.globalAlpha = p.opacity;
                this.ctx.fillStyle = this.options.particleColor;
                this.ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
                this.ctx.fill();
            }
        }
    }
    
    update() {
        for (let i = 0; i < this.particles.length; i++) {
            const p = this.particles[i];
            
            // Move particles
            p.x += p.vx;
            p.y += p.vy;
            
            // Bounce off edges
            if (p.x < 0 || p.x > this.width) p.vx = -p.vx;
            if (p.y < 0 || p.y > this.height) p.vy = -p.vy;
            
            // Slight random movement
            p.vx += (Math.random() - 0.5) * 0.01;
            p.vy += (Math.random() - 0.5) * 0.01;
            
            // Limit speed
            p.vx = Math.max(Math.min(p.vx, this.options.maxSpeed), -this.options.maxSpeed);
            p.vy = Math.max(Math.min(p.vy, this.options.maxSpeed), -this.options.maxSpeed);
            
            // Pulsate opacity
            p.opacity += (Math.random() - 0.5) * 0.01;
            p.opacity = Math.max(Math.min(p.opacity, 0.8), 0.3);
        }
    }
    
    animate() {
        this.update();
        this.draw();
        requestAnimationFrame(this.animate.bind(this));
    }
    
    resize() {
        this.width = this.canvas.width = this.canvas.offsetWidth;
        this.height = this.canvas.height = this.canvas.offsetHeight;
    }
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    const canvas = document.getElementById('admin-particles-canvas');
    if (canvas) {
        // Set canvas dimensions to match parent container
        const resizeCanvas = () => {
            const container = canvas.parentElement;
            canvas.width = container.offsetWidth;
            canvas.height = container.offsetHeight;
        };
        
        // Initial sizing
        resizeCanvas();
        
        // Create particle system
        const particleSystem = new AdminParticle(canvas, {
            particleCount: 50,
            particleColor: '#00bbf0',
            lineColor: 'rgba(255, 255, 255, 0.1)',
            symbolColor: 'rgba(255, 255, 255, 0.7)'
        });
        
        // Resize handler
        window.addEventListener('resize', function() {
            resizeCanvas();
            particleSystem.resize();
        });
    }
});
