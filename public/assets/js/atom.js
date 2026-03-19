// atom.js
(function () {
    const atom = document.getElementById("atom");
    if (!atom) return;
    const tooltip = document.getElementById("textatome");
    // éviter de créer le canvas plusieurs fois
    if (atom.querySelector("canvas")) return;

    // SCENE
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(70, 1, 0.1, 1000);
    const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    atom.appendChild(renderer.domElement);

    // taille du canvas
    function resize() {
        const size = atom.clientHeight || 100;
        renderer.setSize(size, size);
        camera.aspect = 1;
        camera.updateProjectionMatrix();
    }
    resize();
    window.addEventListener("resize", resize);
    renderer.setPixelRatio(window.devicePixelRatio);

    // lumières
    const light1 = new THREE.PointLight(0xffffff, 1);
    light1.position.set(10, 10, 10);
    scene.add(light1);

    const light2 = new THREE.PointLight(0xffffff, 0.8);
    light2.position.set(-10, -10, -10);
    scene.add(light2);

    const ambient = new THREE.AmbientLight(0xffffff, 0.6);
    scene.add(ambient);

    // sphères
    const geo = new THREE.SphereGeometry(0.7, 32, 32);
    const spheres = [
        new THREE.Mesh(geo, new THREE.MeshPhongMaterial({ color: 0xff4444 })), // rouge
        new THREE.Mesh(geo, new THREE.MeshPhongMaterial({ color: 0x44ff44 })), // vert
        new THREE.Mesh(geo, new THREE.MeshPhongMaterial({ color: 0x4444ff })), //  bleu
        new THREE.Mesh(geo, new THREE.MeshPhongMaterial({ color: 0x00D492 })), // turquoise
        new THREE.Mesh(geo, new THREE.MeshPhongMaterial({ color: 0x74D4FF })), // bleu clair
        new THREE.Mesh(geo, new THREE.MeshPhongMaterial({ color: 0xFF2056 })), // rose foncé
        new THREE.Mesh(geo, new THREE.MeshPhongMaterial({ color: 0xff8800 })), // orange
        new THREE.Mesh(geo, new THREE.MeshPhongMaterial({ color: 0x8000ff })), // violet
    ];

    spheres[0].position.set(-3, 0, -1); // rouge
    spheres[1].position.set(0, -1, 2); // vert
    spheres[2].position.set(0, 1.5, 0); //  bleu
    spheres[3].position.set(1.5, -3, -1); // turquoise
    spheres[4].position.set(3.5, -1, 0); // bleu clair
    spheres[5].position.set(4.5, 2, 0); // rose foncé
    spheres[6].position.set(-3.6, 3, 2); // orange
    spheres[7].position.set(-4, -3, 0); // violet

    spheres[0].userData = {link: routes.page1, label: "Dispositifs"};
    spheres[1].userData = {link: routes.page2, label: "Chantier de la dalle"};
    spheres[2].userData = {link: routes.page3, label: "Atelier du Tiers Inclus"};
    spheres[3].userData = {link: routes.page4, label: "Cultures"};
    spheres[4].userData = {link: routes.page5, label: "Co-habiter avec le chantier"};
    spheres[5].userData = {link: routes.page6, label: "Mémoire du quartier"};
    spheres[6].userData = {link: routes.page7, label: "Atelier de la dalle"};
    spheres[7].userData = {link: routes.page8, label: "Arbre à Palabre"};

    spheres.forEach((s) => scene.add(s));
    // calcul du centre de toutes les sphères
    const center = new THREE.Vector3();

    spheres.forEach((s) => {
        center.add(s.position);
    });

    center.divideScalar(spheres.length);

    // faire regarder la caméra vers ce centre
    camera.position.z = 10;
    camera.lookAt(center);

    // bâtons
    function createStick(a, b) {
        const points = [a, b];
        const geometry = new THREE.BufferGeometry().setFromPoints(points);
        const line = new THREE.Line(
            geometry,
            new THREE.LineBasicMaterial({ color: 0x00000 }),
        );
        scene.add(line);
    }
    createStick(spheres[0].position, spheres[2].position);
    createStick(spheres[1].position, spheres[2].position);
    createStick(spheres[1].position, spheres[0].position);

    createStick(spheres[1].position, spheres[3].position);
    createStick(spheres[1].position, spheres[4].position);
    createStick(spheres[1].position, spheres[5].position);

    createStick(spheres[0].position, spheres[6].position);
    createStick(spheres[0].position, spheres[7].position);

    camera.position.z = 10;

    const raycaster = new THREE.Raycaster();
    const mouse = new THREE.Vector2();

    // click
    renderer.domElement.addEventListener("click", (e) => {
        const rect = renderer.domElement.getBoundingClientRect();
        mouse.x = ((e.clientX - rect.left) / rect.width) * 2 - 1;
        mouse.y = -((e.clientY - rect.top) / rect.height) * 2 + 1;

        raycaster.setFromCamera(mouse, camera);
        const intersects = raycaster.intersectObjects(spheres);
        if (intersects.length > 0 && intersects[0].object.userData.link) {
            window.location.href = intersects[0].object.userData.link;
        }
    });
    let hoveredSphere = null;
    // hover
    renderer.domElement.addEventListener("mousemove", (e) => {
        const rect = renderer.domElement.getBoundingClientRect();
        mouse.x = ((e.clientX - rect.left) / rect.width) * 2 - 1;
        mouse.y = -((e.clientY - rect.top) / rect.height) * 2 + 1;

        
        raycaster.setFromCamera(mouse, camera);
        const intersects = raycaster.intersectObjects(spheres);

        if (intersects.length > 0) {
            const current = intersects[0].object;

            renderer.domElement.style.cursor = "pointer";

            // SCALE
            if (hoveredSphere !== current) {
                if (hoveredSphere) hoveredSphere.scale.set(1, 1, 1);

                hoveredSphere = current;
                hoveredSphere.scale.set(1.4, 1.4, 1.4);
            }

            // TOOLTIP
            tooltip.style.opacity = 1;
            tooltip.textContent = current.userData.label || "";

            tooltip.style.left = e.clientX + "px";
            tooltip.style.top = e.clientY + "px";
        } else {
            renderer.domElement.style.cursor = "default";

            if (hoveredSphere) {
                hoveredSphere.scale.set(1, 1, 1);
                hoveredSphere = null;
            }

            tooltip.style.opacity = 0;
        }
    });

    // animation
    function animate() {
        requestAnimationFrame(animate);
        scene.rotation.y += 0.005;
        renderer.render(scene, camera);
    }
    animate();
})();
