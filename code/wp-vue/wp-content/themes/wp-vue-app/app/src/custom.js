export const mascotParallax = function () {
	window.onload = function () {
		let parallaxBox = document.getElementById ( 'app' );
		let mreleft = document.getElementById('mascot_right_eye').getAttribute('cx'),
			mretop = document.getElementById('mascot_right_eye').getAttribute('cy'),
			mleleft = document.getElementById('mascot_left_eye').getAttribute('cx'),
			mletop = document.getElementById('mascot_left_eye').getAttribute('cy');

		parallaxBox.onmousemove = function ( event ) {
			event = event || window.event;
			let x = event.clientX - parallaxBox.offsetLeft,
				y = event.clientY - parallaxBox.offsetTop;

			mouseParallax ( 'mascot_right_eye', mreleft, mretop, x, y);
			mouseParallax ( 'mascot_left_eye', mleleft, mletop, x, y);
		}
	};

	function mouseParallax ( id, left, top, mouseX, mouseY ) {
		left = Number(left);
		top = Number(top);

		let obj = document.getElementById ( id );

		let minLeft = (left - 10);
		let maxLeft = (left + 10);
		let minTop = (top - 10);
		let maxTop = (top + 10);

		if (minLeft < left && maxLeft > left) {
			left = Number(left) + ((mouseX - 100) / 100);
			obj.setAttribute('cx', left);
		}
		if (minTop < top && maxTop > top) {
			top = Number(top) + ((mouseY - 100) / 100);
			obj.setAttribute('cy', top);
		}

	}
};