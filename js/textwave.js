const chunk_count = 100;
const anim_stack = 17;

let txt = document.querySelector(".flexible"),
    w = txt.getBoundingClientRect().width,
    h = txt.getBoundingClientRect().height,
    x_chunk = Math.ceil(w / chunk_count),
    y_chunk = h / chunk_count,
    remaining_pxs = w - x_chunk * 5;

txt.innerHTML = `<div class='mask'><div>${txt.innerHTML}</div></div>`;
let html = txt.innerHTML;

for (let i = 0; i < chunk_count - 1; i++) {
  txt.innerHTML += html;
}

let masks = document.querySelectorAll(".mask");
let inMasks = document.querySelectorAll(".mask div");

for (let i = 0; i < masks.length; i++) {
  masks[i].style.width = x_chunk + "px";
  masks[i].style.height = h + "px"; // Agrega esta línea para establecer la altura de la máscara
  masks[i].style.overflow = "hidden";
  masks[i].style.animationDelay = `${-i * anim_stack}ms`;
  inMasks[i].style.left = -i * x_chunk + "px";
}
