import "./bootstrap";
import {gsap} from "gsap";
import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", function () {
	const background = document.getElementById("background-animation");

	if (!background) return;

	for (let i = 0; i < 50; i++) {
		const bubble = document.createElement("div");
		bubble.className = `absolute w-4 h-4 bg-blue-600 rounded-full opacity-50`;

		background.appendChild(bubble);

		// Animação com GSAP
		gsap.to(bubble, {
			x: `+=${gsap.utils.random(-500, 500)}`,
			y: `+=${gsap.utils.random(-400, 400)}`,
			scale: gsap.utils.random(0.5, 4),
			duration: gsap.utils.random(3, 10),
			repeat: -1,
			yoyo: true,
			ease: "power1.inOut",
		});
	}
});
