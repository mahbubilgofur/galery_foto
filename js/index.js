function toggleVisibility(entries) {
	entries.forEach((entry) => {
		console.log(entry);
		if (entry.isIntersecting) {
			entry.target.classList.add("show");
		} else {
			entry.target.classList.remove("show");
		}
	});
}

// Fungsi untuk mengamati elemen-elemen yang memiliki kelas 'hidden'
function observeHiddenElements() {
	// Gabungkan ketiga selektor menjadi satu string
	const hiddenElements = document.querySelectorAll(
		".top-r, .bttom-r, .cnt-awl,.foto-cont,.content-r-homes,.lc-homes,.mid-homes,.rc-homes"
	);
	hiddenElements.forEach((el) => observer.observe(el));
}

// Buat instance IntersectionObserver
const observer = new IntersectionObserver(toggleVisibility);

// Panggil fungsi untuk mengamati elemen-elemen yang memiliki kelas 'hidden'
observeHiddenElements();

//
document.addEventListener("DOMContentLoaded", function () {
	var albumContainer = document.querySelector(".animasii");
	var nextButton = document.querySelector(".next");
	var prevButton = document.querySelector(".prev");
	var intervalId = null; // Menyimpan ID interval

	// Slide to the next album
	function slideNext() {
		// Menggeser ke album berikutnya
		albumContainer.appendChild(albumContainer.firstElementChild);
		// Menambahkan kelas zoomed pada album yang baru muncul
		albumContainer.firstElementChild.classList.add("zoomed");
		// Menghapus kelas zoomed dari album yang sebelumnya
		var prevSibling = albumContainer.firstElementChild.nextElementSibling;
		if (prevSibling) {
			prevSibling.classList.remove("zoomed");
		}
	}

	// Slide to the previous album
	function slidePrev() {
		// Menggeser ke album sebelumnya
		albumContainer.insertBefore(
			albumContainer.lastElementChild,
			albumContainer.firstElementChild
		);
		// Menambahkan kelas zoomed pada album yang baru muncul
		albumContainer.firstElementChild.classList.add("zoomed");
		// Menghapus kelas zoomed dari album yang sebelumnya
		var nextSibling = albumContainer.lastElementChild.previousElementSibling;
		if (nextSibling) {
			nextSibling.classList.remove("zoomed");
		}
	}

	// Set interval untuk slide otomatis setiap 5 detik
	function startAutoSlide() {
		if (!intervalId) {
			intervalId = setInterval(function () {
				slideNext();
			}, 5000);
		}
	}

	// Hentikan interval saat tombol next atau prev diklik
	function stopAutoSlide() {
		clearInterval(intervalId);
		intervalId = null; // Nolkan ID interval untuk menunjukkan bahwa interval sudah dihentikan
	}

	// Mulai slide otomatis saat halaman dimuat
	startAutoSlide();

	// Klik next
	nextButton.addEventListener("click", function () {
		slideNext();
		stopAutoSlide(); // Hentikan interval
		startAutoSlide(); // Mulai ulang interval
	});

	// Klik prev
	prevButton.addEventListener("click", function () {
		slidePrev();
		stopAutoSlide(); // Hentikan interval
		startAutoSlide(); // Mulai ulang interval
	});
});
