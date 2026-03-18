// atome
const atome = document.getElementById("atom");
 
// SCENE
const scene = new THREE.Scene();
 
const camera = new THREE.PerspectiveCamera(
75,
1,
0.1,
1000
);
 
// RENDERER
const renderer = new THREE.WebGLRenderer({antialias:true, alpha:true});
atome.appendChild(renderer.domElement);
 
// SIZE
function resizeRenderer(){
 
const size = atome.clientHeight;
 
renderer.setSize(size,size);
 
camera.aspect = 1;
camera.updateProjectionMatrix();
 
}
 
resizeRenderer();
 
// LIGHT
// LUMIERE PRINCIPALE
const light1 = new THREE.PointLight(0xffffff,1);
light1.position.set(10,10,10);
scene.add(light1);
 
// LUMIERE ARRIERE
const light2 = new THREE.PointLight(0xffffff,0.8);
light2.position.set(-10,-10,-10);
scene.add(light2);
 
// LUMIERE AMBIANTE
const ambient = new THREE.AmbientLight(0xffffff,0.6);
scene.add(ambient);
 
// GEOMETRIE
const sphereGeo = new THREE.SphereGeometry(0.7,32,32);
 
// SPHERE 1
const sphere1 = new THREE.Mesh(
sphereGeo,
new THREE.MeshPhongMaterial({color:0xff4444})
);
 
sphere1.position.set(-3,0,0);
sphere1.userData.link="page1.html";
scene.add(sphere1);
 
// SPHERE 2
const sphere2 = new THREE.Mesh(
sphereGeo,
new THREE.MeshPhongMaterial({color:0x44ff44})
);
 
sphere2.position.set(3,0,0);
sphere2.userData.link="page2.html";
scene.add(sphere2);
 
// SPHERE 3
const sphere3 = new THREE.Mesh(
sphereGeo,
new THREE.MeshPhongMaterial({color:0x4444ff})
);
 
sphere3.position.set(0,3,0);
sphere3.userData.link="page3.html";
scene.add(sphere3);
 
// BATONS
function createStick(a,b){
 
const points=[a,b];
const geometry=new THREE.BufferGeometry().setFromPoints(points);
 
const material=new THREE.LineBasicMaterial({color:0xffffff});
const line=new THREE.Line(geometry,material);
 
scene.add(line);
 
}
 
createStick(sphere1.position,sphere2.position);
createStick(sphere2.position,sphere3.position);
 
// CAMERA
camera.position.z=8;
 
// RAYCAST
const raycaster=new THREE.Raycaster();
const mouse=new THREE.Vector2();
 
 
// CLICK
renderer.domElement.addEventListener("click",(event)=>{
 
const rect = renderer.domElement.getBoundingClientRect();
 
mouse.x=((event.clientX-rect.left)/rect.width)*2-1;
mouse.y=-((event.clientY-rect.top)/rect.height)*2+1;
 
raycaster.setFromCamera(mouse,camera);
 
const intersects=raycaster.intersectObjects([sphere1,sphere2,sphere3]);
 
if(intersects.length>0){
 
const obj=intersects[0].object;
 
if(obj.userData.link){
window.location.href=obj.userData.link;
}
 
}
 
});
 
 
// HOVER (cursor pointer)
renderer.domElement.addEventListener("mousemove",(event)=>{
 
const rect = renderer.domElement.getBoundingClientRect();
 
mouse.x=((event.clientX-rect.left)/rect.width)*2-1;
mouse.y=-((event.clientY-rect.top)/rect.height)*2+1;
 
raycaster.setFromCamera(mouse,camera);
 
const intersects=raycaster.intersectObjects([sphere1,sphere2,sphere3]);
 
if(intersects.length>0){
 
renderer.domElement.style.cursor="pointer";
 
}else{
 
renderer.domElement.style.cursor="default";
 
}
 
});
 
 
// ANIMATION
function animate(){
 
requestAnimationFrame(animate);
 
scene.rotation.y+=0.005;
 
renderer.render(scene,camera);
 
}
 
animate();
 
 
// RESIZE
window.addEventListener("resize",resizeRenderer);