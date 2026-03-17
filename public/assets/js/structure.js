let x = 0, y = 0;
let animationId = null;
// let x = 0, y = 0;

const spacing = 15;
const radius = 1;
const color = "#999";

const bgCanvas = document.createElement("canvas");
const bgCtx = bgCanvas.getContext("2d");

function drawDots() {
    bgCtx.clearRect(0, 0, bgCanvas.width, bgCanvas.height);
    for (let x = spacing / 2; x < bgCanvas.width; x += spacing) {
        for (let y = spacing / 2; y < bgCanvas.height; y += spacing) {
            bgCtx.beginPath();
            bgCtx.arc(x, y, radius, 0, Math.PI * 2);
            bgCtx.fillStyle = color;
            bgCtx.fill();
        }
    }
}

// function initCursor() {
//     const cursor = document.getElementById("cursor");
//     if (!cursor) return;

//     document.onmousemove = (e) => {
//         x = e.clientX;
//         y = e.clientY;
//     };

//     function animateCircle() {
//         cursor.style.left = x + "px";
//         cursor.style.top = y + "px";
//         requestAnimationFrame(animateCircle);
//     }

//     animateCircle();
// }

function initPage() {
  
    // initCursor();
    if (document.getElementById("canvas")) {
        initCanvas();
    }
    if(document.getElementById("cuboCanvas")) initEchaf();
}

document.addEventListener("DOMContentLoaded", initPage);

document.addEventListener("click", function (e) {
    const link = e.target.closest("a");
    if (!link) return;

    const url = link.getAttribute("href");
    const direction = link.dataset.direction;

    if (!url || url.startsWith("http") || link.target === "_blank" || !direction) return;

    e.preventDefault();
    loadPage(url, direction);
});

function loadPage(url, direction) {
    if (animationId) {
        cancelAnimationFrame(animationId);
        animationId = null;
    }

    const container = document.querySelector(".corps");
    const wrapper = document.getElementById("page-container");

    const transitionDiv = document.createElement("div");
    transitionDiv.classList.add("page-transition", `from-${direction}`);

    fetch(url)
        .then(res => res.text())
        .then(html => {
            const temp = document.createElement("div");
            temp.innerHTML = html;

            const newContent = temp.querySelector(".corps");
            if (!newContent) return;

            transitionDiv.innerHTML = newContent.innerHTML;
            wrapper.appendChild(transitionDiv);

            const newTitle = temp.querySelector("title")?.innerText;
            transitionDiv.offsetHeight;
            transitionDiv.classList.add("show");

            setTimeout(() => {
                container.innerHTML = newContent.innerHTML;
                transitionDiv.remove();
                if (newTitle) document.title = newTitle;
                history.pushState({}, "", url);
                initPage();
            }, 700);
        })
        .catch(console.error);
}

window.addEventListener("popstate", () => {
    fetch(location.href)
        .then(res => res.text())
        .then(html => {
            const temp = document.createElement("div");
            temp.innerHTML = html;
            const newContent = temp.querySelector(".corps");
            if (newContent) {
                document.querySelector(".corps").innerHTML = newContent.innerHTML;
                initPage();
            }
        });
});

function initCanvas() {
    const canva = document.getElementById("canvas");
    if (!canva) return;

    const context = canva.getContext("2d");
    let lignes = [];
    let connections = [];

    function resizeCanvas() {
        canva.width = window.innerWidth;
        canva.height = window.innerHeight;
        bgCanvas.width = canva.width;
        bgCanvas.height = canva.height;
        drawDots();
    }

    resizeCanvas();

    class Ligne {
        constructor(x1, y1, x2, y2, direction = 1) {
            this.x1 = x1; this.y1 = y1;
            this.x2 = x2; this.y2 = y2;
            this.progress = 0;
            this.speed = 0.045;
            const dx = x2 - x1, dy = y2 - y1;
            this.cx = (x1 + x2) / 2 + dy * direction;
            this.cy = (y1 + y2) / 2 - dx * direction;
        }
        getPoint(t) {
            const x = (1 - t) * (1 - t) * this.x1 + 2 * (1 - t) * t * this.cx + t * t * this.x2;
            const y = (1 - t) * (1 - t) * this.y1 + 2 * (1 - t) * t * this.cy + t * t * this.y2;
            return { x, y };
        }
        draw() {
            context.beginPath();
            const steps = 60;
            const maxT = Math.min(this.progress, 1);
            for (let i = 0; i <= steps * maxT; i++) {
                const t = i / steps;
                const p = this.getPoint(t);
                if (i === 0) context.moveTo(p.x, p.y); else context.lineTo(p.x, p.y);
            }
            context.stroke();
            if (this.progress >= 1) this.drawArrow();
        }
        drawArrow() {
            const p1 = this.getPoint(0.98);
            const p2 = this.getPoint(1);
            const angle = Math.atan2(p2.y - p1.y, p2.x - p1.x);
            const size = 10;
            context.beginPath();
            context.moveTo(p2.x, p2.y);
            context.lineTo(p2.x - size * Math.cos(angle - Math.PI / 6), p2.y - size * Math.sin(angle - Math.PI / 6));
            context.lineTo(p2.x - size * Math.cos(angle + Math.PI / 6), p2.y - size * Math.sin(angle + Math.PI / 6));
            context.closePath();
            context.fill();
        }
        update() { if (this.progress < 1) this.progress += this.speed; }
    }

    function buildLines(config) {
        const { sources = [], targets = [], side = "bottom", targetSide = "top", curveStrength = 0.3 } = config;
        sources.forEach((source, sIndex) => {
            const src = source.getBoundingClientRect();
            let startX = src.left + src.width / 2, startY = src.bottom + window.scrollY;
            if (side === "top") startY = src.top + window.scrollY;
            else if (side === "left") { startX = src.left; startY = src.top + src.height/2 + window.scrollY; }
            else if (side === "right") { startX = src.right; startY = src.top + src.height/2 + window.scrollY; }
            else if (side === "bottom") startY = src.bottom + window.scrollY;

            targets.forEach((target, tIndex) => {
                const trg = target.getBoundingClientRect();
                let endX = trg.left + trg.width/2, endY = trg.bottom + window.scrollY;
                if (targetSide === "top") endY = trg.top + window.scrollY;
                else if (targetSide === "left") { endX = trg.left; endY = trg.top + trg.height/2 + window.scrollY; }
                else if (targetSide === "right") { endX = trg.right; endY = trg.top + trg.height/2 + window.scrollY; }
                else if (targetSide === 'bottom') endY = trg.bottom + window.scrollY;

                const direction = ((sIndex + tIndex) % 2 === 0 ? 1 : -1) * curveStrength;
                lignes.push(new Ligne(startX, startY, endX, endY, direction));
            });
        });
    }

    function animate() {
        context.clearRect(0, 0, canva.width, canva.height);
        context.drawImage(bgCanvas, 0, 0);
        lignes.forEach(l => { l.draw(); l.update(); });
        animationId = requestAnimationFrame(animate);
    }

    // Pulizia se non ci sono div
    const uno = document.getElementById("un");
    const due = document.getElementById("deux");
    const tre = document.getElementById("trois");
    if (!(uno && due && tre)) { context.clearRect(0,0,canva.width,canva.height); context.drawImage(bgCanvas,0,0); return; }

    // Configurazione linee: puoi cambiarla come vuoi
    connections = [
        { sources: [uno], targets: [due], side: "right", targetSide: "top", curveStrength: 0.3 },
        { sources: [due], targets: [tre], side: "bottom", targetSide: "bottom", curveStrength: -0.3 }
    ];

    lignes = [];
    connections.forEach(buildLines);
    animate();

    window.addEventListener("resize", () => { resizeCanvas(); lignes = []; connections.forEach(buildLines); });
}
function initEchaf()
{const canvas = document.getElementById("cuboCanvas");
const ctx = canvas.getContext("2d");

const links = document.querySelectorAll(".menu-link");


let centerX = canvas.width / 2;
let centerY = canvas.height / 2;
function resize() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;


    centerX = canvas.width / 2;
    centerY = canvas.height / 2;
}
resize();
window.addEventListener("resize", resize);

// ---------- 3D utils ----------
function createBox(w, h, d, ox = 0, oy = 0, oz = 0) {
    return [
        [-w / 2 + ox, -h / 2 + oy, -d / 2 + oz],
        [w / 2 + ox, -h / 2 + oy, -d / 2 + oz],
        [w / 2 + ox, h / 2 + oy, -d / 2 + oz],
        [-w / 2 + ox, h / 2 + oy, -d / 2 + oz],
        [-w / 2 + ox, -h / 2 + oy, d / 2 + oz],
        [w / 2 + ox, -h / 2 + oy, d / 2 + oz],
        [w / 2 + ox, h / 2 + oy, d / 2 + oz],
        [-w / 2 + ox, h / 2 + oy, d / 2 + oz],
    ];
}

function project([x, y, z]) {
    const scale = 400 / (z + 400);
    return [x * scale + centerX, y * scale + centerY];
}

// ---------- line generation ----------
function createFaceLines(v0, v1, v2, v3, steps = 5) {
    const lines = [];
    for (let i = 0; i <= steps; i++) {
        const t = i / steps;

        const a = lerp3(v0, v1, t);
        const b = lerp3(v3, v2, t);
        lines.push(makeLine(a, b));

        const c = lerp3(v0, v3, t);
        const d = lerp3(v1, v2, t);
        lines.push(makeLine(c, d));
    }
    return lines;
}

function lerp3(a, b, t) {
    return [
        a[0] + (b[0] - a[0]) * t,
        a[1] + (b[1] - a[1]) * t,
        a[2] + (b[2] - a[2]) * t,
    ];
}

function makeLine(start, end) {
    return {
        start,
        end,
        progress: 0,
        delay: Math.random() * 200,
        speed: 0.01 + Math.random() * 0.002,
    };
}

function generateBoxLines(box) {
    const faces = [
        [0, 1, 2, 3],
        [4, 5, 6, 7],
        [0, 1, 5, 4],
        [3, 2, 6, 7],
        [0, 3, 7, 4],
        [1, 2, 6, 5],
    ];
    let lines = [];
    faces.forEach((f) =>
        lines.push(
            ...createFaceLines(box[f[0]], box[f[1]], box[f[2]], box[f[3]]),
        ),
    );
    return lines;
}

// ---------- protrusions ----------
function addProtrusions(lines, chance = 0.3, length = 30) {
    const extra = [];

    lines.forEach((l) => {
        if (Math.random() < chance) {
            const dirBase = normalize([
                l.end[0] - l.start[0],
                l.end[1] - l.start[1],
                l.end[2] - l.start[2],
            ]);

            const fromStart = Math.random() < 0.5;

            const origin = fromStart ? l.start : l.end;
            const dir = fromStart
                ? [-dirBase[0], -dirBase[1], -dirBase[2]] // verso l’esterno da start
                : dirBase; // verso l’esterno da end

            extra.push(
                makeLine(origin, [
                    origin[0] + dir[0] * length,
                    origin[1] + dir[1] * length,
                    origin[2] + dir[2] * length,
                ]),
            );
        }
    });

    return lines.concat(extra);
}

function generateRoots(baseY, count = 8, maxDepth = 3) {
    const roots = [];

    function branch(start, depth, length) {
        if (depth > maxDepth) return;

        const dir = normalize([
            (Math.random() - 0.5) * 1.6,
            1, // sempre verso il basso
            (Math.random() - 0.5) * 1.6,
        ]);

        const segments = 3;
        let prev = start;

        // ---- segmento curvo ----
        for (let i = 0; i < segments; i++) {
            const bendDir = normalize([
                dir[0] + (Math.random() - 0.5) * 0.8,
                dir[1],
                dir[2] + (Math.random() - 0.5) * 0.8,
            ]);

            const next = [
                prev[0] + bendDir[0] * (length / segments),
                prev[1] + bendDir[1] * (length / segments),
                prev[2] + bendDir[2] * (length / segments),
            ];

            const line = makeLine(prev, next);
            line.speed *= 1;
            line.isRoot = true;
            line.thickness = Math.max(0.15, 1.2 - depth * 0.25);

            roots.push(line);
            prev = next;
        }

        // ---- diramazioni secondarie ----
        const children = 1 + Math.floor(Math.random() * 2);
        for (let i = 0; i < children; i++) {
            branch(prev, depth + 1, length * 0.75);
        }
    }

    // punti di partenza lungo la base
    for (let i = 0; i < count; i++) {
        const start = [
            (Math.random() - 0.5) * 240,
            baseY - Math.random() * 15,
            (Math.random() - 0.5) * 100,
        ];
        branch(start, 1, 32);
    }

    return roots;
}

function easeInOut(t) {
    return t * t * (3 - 2 * t);
}

function generateSideBranches(structureWidth = 300, count = 6, maxDepth = 2) {
    const branches = [];

    function branch(start, depth, length) {
        if (depth > maxDepth) return;

        // direzione iniziale: forte uscita laterale
        let currentDir = normalize([
            (start[0] > 0 ? 1 : -1) * (0.9 + Math.random() * 0.3),
            -0.2,
            (Math.random() - 0.5) * 0.4,
        ]);

        const segments = 8;
        let prev = start;
        let lastLine = null;

        for (let i = 0; i < segments; i++) {
            const t = i / (segments - 1);
            const e = easeInOut(t);

            // rumore progressivo (più libero verso la punta)
            const noiseStrength = 0.05 + e * 0.25;

            const noise = [
                (Math.random() - 0.5) * noiseStrength,
                (Math.random() - 0.5) * noiseStrength,
                (Math.random() - 0.5) * noiseStrength,
            ];

            // forza biologica: uscita + lieve caduta
            const targetDir = normalize([
                currentDir[0] + noise[0],
                currentDir[1] + noise[1] - 0.6 * e,
                currentDir[2] + noise[2],
            ]);

            // 🔑 inerzia
            currentDir = normalize([
                currentDir[0] * 0.8 + targetDir[0] * 0.2,
                currentDir[1] * 0.8 + targetDir[1] * 0.2,
                currentDir[2] * 0.8 + targetDir[2] * 0.2,
            ]);

            const step = (length / segments) * (1 - t * 0.25); // perdita energia
            const next = [
                prev[0] + currentDir[0] * step,
                prev[1] + currentDir[1] * step,
                prev[2] + currentDir[2] * step,
            ];

            const line = makeLine(prev, next);
            line.speed *= 1.4;
            line.isBranch = true;

            // fruit aléatoire sur la branche
            if (Math.random() < 0.04) {
                line.fruit = {
                    pos: [
                        prev[0] + (next[0] - prev[0]) * Math.random(),
                        prev[1] + (next[1] - prev[1]) * Math.random(),
                        prev[2] + (next[2] - prev[2]) * Math.random(),
                    ],
                    size: 4 + Math.random() * 2,
                };
            }

            branches.push(line);
            lastLine = line;
            prev = next;
        }

        // 🍒 frutto solo alla fine, con imperfezione
        if (depth === maxDepth && lastLine) {
            lastLine.fruit = {
                pos: [
                    prev[0] + (Math.random() - 0.5) * 4,
                    prev[1] + (Math.random() - 0.5) * 4,
                    prev[2] + (Math.random() - 0.5) * 4,
                ],
                size: 5 + Math.random(), // tra 5 e 6
            };
        }

        const children = 2 + Math.floor(Math.random() * 2);
        for (let i = 0; i < children; i++) {
            branch(prev, depth + 1, length * 0.7);
        }
    }

    for (let i = 0; i < count; i++) {
        let start;

        if (Math.random() < 0.35) {
            // branches internes
            start = [
                (Math.random() - 0.5) * 120,
                Math.random() * 160 - 80,
                (Math.random() - 0.5) * 80,
            ];
        } else {
            // branches externes
            const side = Math.random() < 0.5 ? 1 : -1;

            start = [
                side * (structureWidth / 2),
                Math.random() * 180 - 90,
                (Math.random() - 0.5) * 120,
            ];
        }

        branch(start, 1, 90);
    }

    return branches;
}

function generateTopBranches(boxHeight = 200, count = 6, maxDepth = 2) {
    const branches = [];

    function branch(start, depth, length) {
        if (depth > maxDepth) return;

        let currentDir = normalize([
            (Math.random() - 0.5) * 0.6,
            -0.8,
            (Math.random() - 0.5) * 0.6,
        ]);

        const segments = 7;
        let prev = start;
        let lastLine = null;

        for (let i = 0; i < segments; i++) {
            const t = i / (segments - 1);
            const e = easeInOut(t);

            const noiseStrength = 0.05 + e * 0.2;

            const noise = [
                (Math.random() - 0.5) * noiseStrength,
                (Math.random() - 0.5) * noiseStrength,
                (Math.random() - 0.5) * noiseStrength,
            ];

            // attrazione verso l’esterno solo dopo metà ramo
            const outward = e > 0.5 ? 0.4 * (prev[0] > 0 ? 1 : -1) : 0;

            const targetDir = normalize([
                currentDir[0] + noise[0] + outward,
                currentDir[1] - 0.4 * e + noise[1],
                currentDir[2] + noise[2],
            ]);

            currentDir = normalize([
                currentDir[0] * 0.75 + targetDir[0] * 0.25,
                currentDir[1] * 0.75 + targetDir[1] * 0.25,
                currentDir[2] * 0.75 + targetDir[2] * 0.25,
            ]);

            const step = (length / segments) * (1 - t * 0.3);
            const next = [
                prev[0] + currentDir[0] * step,
                prev[1] + currentDir[1] * step,
                prev[2] + currentDir[2] * step,
            ];

            const line = makeLine(prev, next);
            line.speed *= 1.2;
            line.isBranch = true;

            // fruit aléatoire sur la branche
            if (Math.random() < 0.12) {
                line.fruit = {
                    pos: [
                        prev[0] + (next[0] - prev[0]) * Math.random(),
                        prev[1] + (next[1] - prev[1]) * Math.random(),
                        prev[2] + (next[2] - prev[2]) * Math.random(),
                    ],
                    size: 4 + Math.random() * 2,
                };
            }

            branches.push(line);
            lastLine = line;
            prev = next;
        }

        if (depth === maxDepth && lastLine) {
            lastLine.fruit = {
                pos: [
                    prev[0] + (Math.random() - 0.5) * 3,
                    prev[1] + (Math.random() - 0.5) * 3,
                    prev[2] + (Math.random() - 0.5) * 3,
                ],
                size: 3 + Math.random(), // tra 3 e 4
            };
        }

        const children = 1 + Math.floor(Math.random() * 2);
        for (let i = 0; i < children; i++) {
            branch(prev, depth + 1, length * 0.75);
        }
    }

    for (let i = 0; i < count; i++) {
        let start;

        if (Math.random() < 0.35) {
            // branches internes
            start = [
                (Math.random() - 0.5) * 120,
                Math.random() * 120 - 60,
                (Math.random() - 0.5) * 80,
            ];
        } else {
            // branches du sommet
            start = [
                (Math.random() - 0.5) * 260,
                -boxHeight / 2 - 10,
                (Math.random() - 0.5) * 100,
            ];
        }

        branch(start, 1, 75);
    }

    return branches;
}

function drawFruitShape(x, y, size, growth = 1) {
    const s = size * growth;

    ctx.beginPath();

    // punto iniziale sinistra
    ctx.moveTo(x - s, y);

    // lobo sinistro
    ctx.bezierCurveTo(x - s, y - s, x - s * 0.2, y - s, x, y - s * 0.6);

    // lobo centrale
    ctx.bezierCurveTo(x + s * 0.2, y - s, x + s, y - s, x + s, y);

    // lobo destro / chiusura sotto
    ctx.bezierCurveTo(x + s, y + s, x - s, y + s, x - s, y);

    ctx.closePath();
    ctx.fill();
}

function normalize(v) {
    const m = Math.hypot(v[0], v[1], v[2]);
    return [v[0] / m, v[1] / m, v[2] / m];
}

function showLinks() {
    links.forEach(link => {
        link.style.opacity = "1";
        link.style.scale = "1";
    });
}

// ---------- structure ----------
const baseBox = createBox(300, 200, 120);
const towerBox = createBox(120, 260, 80, 0, -40);

const baseY = Math.max(
    ...baseBox.map((v) => v[1]),
    ...towerBox.map((v) => v[1]),
);

const structureLines = [
    ...generateBoxLines(baseBox),
    ...generateBoxLines(towerBox),
];
let lines = [...structureLines];
lines = addProtrusions(lines, 0.5, 35);

// Radici (inizialmente con delay alto, non visibili)
const rootLines = generateRoots(baseY, 52, 3);
rootLines.forEach((l) => (l.delay = 100));

// Rami laterali (anche loro con delay alto)
const sideBranches = generateSideBranches(300, 20, 2);
sideBranches.forEach((l) => (l.delay = 100));

const topBranches = generateTopBranches(200, 15, 2);
topBranches.forEach((l) => (l.delay = 120));

// lines = lines.concat(topBranches);

// Tutte le linee nello stesso array per animate()
lines = lines.concat(rootLines, sideBranches, topBranches);

let phase = 0; // 0 = struttura, 1 = radici, 2 = rami laterali

function animate() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    let done = true;

    lines.forEach((l) => {
        if (l.delay > 0) {
            l.delay--;
            done = false;
            return;
        }

        if (l.progress < 1) {
            l.progress += l.speed;
            l.progress = Math.min(l.progress, 1);
            done = false;
        }

        const p = lerp3(l.start, l.end, l.progress);
        const [x0, y0] = project(l.start);
        const [x1, y1] = project(p);

        // linee radici
        if (l.isRoot) ctx.lineWidth = l.thickness * l.progress;
        else ctx.lineWidth = 0.5;

        ctx.strokeStyle ="grey";

        ctx.beginPath();
        ctx.moveTo(x0, y0);
        ctx.lineTo(x1, y1);
        ctx.stroke();

        // frutti
        if (l.fruit && l.progress > 0.9) {
            const [fx, fy] = project(l.fruit.pos);

            const grow = Math.min((l.progress - 0.9) / 0.1, 1);

            ctx.fillStyle = "crimson";
            showLinks();
            drawFruitShape(fx, fy, l.fruit.size, grow);
        }
    });

    // Gestione fasi
    if (done) {
        if (phase === 0) {
            // struttura completata
            rootLines.forEach((l) => {
                if (l.delay > 9000) l.delay = Math.random() * 60;
            });
            
            phase = 1;
            done = false;
        } else if (phase === 1) {
            // radici completate
            sideBranches.forEach((l) => {
                if (l.delay > 9000) l.delay = Math.random() * 60;
            });
           
            phase = 2;
            done = false;
        }

//         else if (phase === 2) {
  
//   phase = 3;
// }
    }

    requestAnimationFrame(animate);
}

animate();}
// JS des carrousels



document.addEventListener('DOMContentLoaded', function() {
    // Sélectionne tous les carrousels
    let carousels = document.querySelectorAll('[id^="carousel"]');

    carousels.forEach(carousel => {
        let id = carousel.id;
        let container = carousel.querySelector('.flex');
        let items = carousel.querySelectorAll('.vignette');
        let prevBtn = document.querySelector(`[data-carousel="${id}"].carousel-prev`);
        let nextBtn = document.querySelector(`[data-carousel="${id}"].carousel-next`);

        let currentIndex = 0;
        let itemWidth = 23; // % de la largeur d'une image

        // Met à jour la position du carrousel
        function updatePosition() {
            let offset = -currentIndex * itemWidth;
            container.style.transform = `translateX(${offset}%)`;
            // Désactive les boutons si on est au début ou à la fin
            prevBtn.disabled = currentIndex === 0;
            nextBtn.disabled = currentIndex >= items.length - 4;
        }

        // Événement pour le bouton précédent
        prevBtn.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                updatePosition();
            }
        });

        // Événement pour le bouton suivant
        nextBtn.addEventListener('click', () => {
            if (currentIndex < items.length - 4) {
                currentIndex++;
                updatePosition();
            }
        });

        // Initialise la position
        updatePosition();
    });
});
