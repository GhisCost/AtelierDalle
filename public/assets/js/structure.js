let x = 0, y = 0;


function initCursor() {
    const cursor = document.getElementById('cursor');
    if (!cursor) return;

    document.addEventListener('mousemove', e => {
        x = e.clientX;
        y = e.clientY;
    });

    function animateCircle() {
        cursor.style.left = x + 'px';
        cursor.style.top = y + 'px';
        requestAnimationFrame(animateCircle);
    }

    animateCircle();
}

function initPage() {
    initCanvas();
    initCursor();
}

document.addEventListener('DOMContentLoaded', () => {
    initPage();
});

document.addEventListener("click", function (e) {
    const link = e.target.closest("a");
    if (!link) return;

    const url = link.getAttribute("href");
    const direction = link.dataset.direction;

    // Liens normaux → laisser passer
    if (
        !url ||
        url.startsWith("http") ||
        link.target === "_blank" ||
        !direction
    ) {
        return;
    }

    e.preventDefault();
    loadPage(url, direction);
});

function loadPage(url, direction) {
    const container = document.querySelector(".corps");
    const wrapper = document.getElementById("page-container");

    const transitionDiv = document.createElement("div");
    transitionDiv.classList.add("page-transition", `from-${direction}`);

    fetch(url)
        .then((res) => res.text())
        .then((html) => {
            const temp = document.createElement("div");
            temp.innerHTML = html;

            const newContent = temp.querySelector(".corps");
            if (!newContent) return;

            transitionDiv.innerHTML = newContent.innerHTML;
            wrapper.appendChild(transitionDiv);

            const newTitle = temp.querySelector("title")?.innerText;

            // forcer le reflow
            transitionDiv.offsetHeight;
            transitionDiv.classList.add("show");

            setTimeout(() => {
                container.innerHTML = newContent.innerHTML;
                transitionDiv.remove();
                if (newTitle) {
                    document.title = newTitle;
                }
                history.pushState({}, "", url);
                initPage();
            }, 700);
           
        })
        .catch((err) => console.error(err));
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

const spacing = 15; // distanza tra i punti
      const radius = 0.5; // raggio del punto
      const color = "#999";
 


function initCanvas() {
  const canva = document.getElementById("canvas");
 
  if (!canva) {
    console.error("Canvas con id='canvas' non trovato");
    return;
  }

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
 
 
  const context = canva.getContext("2d");
 
  let connections = [];
  let lignes = [];
 
  function resizeCanvas() {
    canva.width = window.innerWidth;
    canva.height = window.innerHeight;

    bgCanvas.width = canva.width;
        bgCanvas.height = canva.height;

    drawDots();
  }
 
  class Ligne {
    constructor(x1, y1, x2, y2, direction = 1) {
      this.x1 = x1;
      this.y1 = y1;
      this.x2 = x2;
      this.y2 = y2;
 
      this.progress = 0;
      this.speed = 0.045;
 
      const dx = x2 - x1;
      const dy = y2 - y1;
 
      // direction: 1 = destra, -1 = sinistra
      this.cx = (x1 + x2) / 2 + dy * direction;
      this.cy = (y1 + y2) / 2 - dx * direction;
    }
 
    getPoint(t) {
      const x =
        (1 - t) * (1 - t) * this.x1 +
        2 * (1 - t) * t * this.cx +
        t * t * this.x2;
 
      const y =
        (1 - t) * (1 - t) * this.y1 +
        2 * (1 - t) * t * this.cy +
        t * t * this.y2;
 
      return { x, y };
    }
 
    draw() {
      context.beginPath();
      const steps = 60;
      const maxT = Math.min(this.progress, 1);
 
      for (let i = 0; i <= steps * maxT; i++) {
        const t = i / steps;
        const p = this.getPoint(t);
        if (i === 0) context.moveTo(p.x, p.y);
        else context.lineTo(p.x, p.y);
      }
 
      context.stroke();
 
      // disegna la freccia solo a fine animazione
      if (this.progress >= 1) this.drawArrow();
    }
 
    drawArrow() {
      const p1 = this.getPoint(0.98);
      const p2 = this.getPoint(1);
 
      const angle = Math.atan2(p2.y - p1.y, p2.x - p1.x);
      const size = 10;
 
      context.beginPath();
      context.moveTo(p2.x, p2.y);
      context.lineTo(
        p2.x - size * Math.cos(angle - Math.PI / 6),
        p2.y - size * Math.sin(angle - Math.PI / 6)
      );
      context.lineTo(
        p2.x - size * Math.cos(angle + Math.PI / 6),
        p2.y - size * Math.sin(angle + Math.PI / 6)
      );
      context.closePath();
      context.fill();
    }
 
    update() {
      if (this.progress < 1) this.progress += this.speed;
    }
  }
 
  function buildLine(config) {
    const {
      sources = [],
      targets = [],
      side = "bottom",
      targetSide = "top",
      curveStrength = 0.3,
    } = config;
 
    sources.forEach((source, sIndex) => {
      const src = source.getBoundingClientRect();
      let startX, startY;
 
      switch (side) {
        case "top":
          startX = src.left + src.width / 2;
          startY = src.top + window.scrollY;
          break;
        case "left":
          startX = src.left;
          startY = src.top + src.height / 2 + window.scrollY;
          break;
        case "right":
          startX = src.right;
          startY = src.top + src.height / 2 + window.scrollY;
          break;
        default:
          startX = src.left + src.width / 2;
          startY = src.bottom + window.scrollY;
      }
 
      targets.forEach((target, index) => {
        const trg = target.getBoundingClientRect();
        let endX, endY;
 
        switch (targetSide) {
          case "right":
            endX = trg.right;
            endY = trg.top + trg.height / 2 + window.scrollY;
            break;
          case "left":
            endX = trg.left;
            endY = trg.top + trg.height / 2 + window.scrollY;
            break;
          case "top":
            endX = trg.left + trg.width / 2;
            endY = trg.top + window.scrollY;
            break;
          default:
            endX = trg.left + trg.width / 2;
            endY = trg.bottom + window.scrollY;
        }
 
        const direction = (sIndex + index) % 2 === 0 ? 1 : -1;
 
        lignes.push(
          new Ligne(startX, startY, endX, endY, direction * curveStrength)
        );
 
        target.style.opacity = 1;
      });
    });
  }
 
  function rebuildLines() {
    lignes = [];
    connections.forEach(buildLine);
  }
 
  function init(config) {
    if (!connections.includes(config)) connections.push(config);
    buildLine(config);
  }
 
  function animate() {
    context.clearRect(0, 0, canva.width, canva.height);
    context.drawImage(bgCanvas, 0, 0);
 
    lignes.forEach((l) => {
      l.draw();
      l.update();
    });
 
    requestAnimationFrame(animate);
  }
 
  const uno = document.getElementById("un");
  const due = document.getElementById("deux");
  const tre = document.getElementById("trois");
 
  resizeCanvas();
 
  window.addEventListener("resize", () => {
    resizeCanvas();
    lignes = [];
    rebuildLines();
  });
 
  if (uno && due && tre) {
    const steps = [
      () =>
        init({
          sources: [uno],
          targets: [due],
          side: "right",
          targetSide: "left",
        }),
      () =>
        init({
          sources: [due],
          targets: [tre],
          side: "top",
          targetSide: "left",
        }),
    ];
 
    let step = 0;
 
    function playNext() {
      if (step >= steps.length) return;
      steps[step++]();
      setTimeout(playNext, 1200);
    }
 
    animate();
    playNext();
  }
};
 
// document.addEventListener("DOMContentLoaded", () =>{
//     initCanvas();
// })


