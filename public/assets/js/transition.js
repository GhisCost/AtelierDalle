
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
    .then(res => res.text())
    .then(html => {
      const temp = document.createElement("div");
      temp.innerHTML = html;

      const newContent = temp.querySelector(".corps");
      if (!newContent) return;

      transitionDiv.innerHTML = newContent.innerHTML;
      wrapper.appendChild(transitionDiv);

      // forcer le reflow
      transitionDiv.offsetHeight;
      transitionDiv.classList.add("show");

      setTimeout(() => {
        container.innerHTML = newContent.innerHTML;
        transitionDiv.remove();
        history.pushState({}, "", url);
      }, 700);
    })
    .catch(err => console.error(err));
}