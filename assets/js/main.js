"use strict";

function get_siblings(elem) {
	// for collecting siblings
	let siblings = [];
	// if no parent, return no sibling
	if (!elem.parentNode) {
		return siblings;
	}
	// first child of the parent node
	let sibling = elem.parentNode.firstChild;
	// collecting siblings
	while (sibling) {
		if (sibling.nodeType === 1 && sibling !== elem) {
			siblings.push(sibling);
		}
		sibling = sibling.nextSibling;
	}
	return siblings;
}

function slideDown(elem) {
	elem.style.height = `${elem.scrollHeight}px`;
}

function slideToggle(elem) {
	if (elem.offsetHeight === 0) {
		elem.style.height = `${elem.scrollHeight}px`;
	} else {
		elem.style.height = 0;
	}
}

function setHeaderScrollClass() {
	const header = document.querySelector(".header");

	window.addEventListener("scroll", function () {
		if (window.scrollY >= header.offsetHeight) {
			header.classList.add("scroll");
		} else {
			header.classList.remove("scroll");
		}
	});
}

function setTelMask() {
	[].forEach.call(document.querySelectorAll('[type="tel"]'), function (input) {
		let keyCode;

		function mask(event) {
			event.keyCode && (keyCode = event.keyCode);
			let pos = this.selectionStart;
			if (pos < 3) event.preventDefault();
			let matrix = "+7 (___) ___-__-__",
				i = 0,
				def = matrix.replace(/\D/g, ""),
				val = this.value.replace(/\D/g, ""),
				new_value = matrix.replace(/[_\d]/g, function (a) {
					return i < val.length ? val.charAt(i++) || def.charAt(i) : a;
				});
			i = new_value.indexOf("_");
			if (i != -1) {
				i < 5 && (i = 3);
				new_value = new_value.slice(0, i);
			}
			let reg = matrix
				.substr(0, this.value.length)
				.replace(/_+/g, function (a) {
					return "\\d{1," + a.length + "}";
				})
				.replace(/[+()]/g, "\\$&");
			reg = new RegExp("^" + reg + "$");
			if (
				!reg.test(this.value) ||
				this.value.length < 5 ||
				(keyCode > 47 && keyCode < 58)
			)
				this.value = new_value;
			if (event.type == "blur" && this.value.length < 5) this.value = "";
		}

		input.addEventListener("input", mask, false);
		input.addEventListener("focus", mask, false);
		input.addEventListener("blur", mask, false);
		input.addEventListener("keydown", mask, false);
	});
}

function sendForm() {
	document.querySelectorAll("form[name]").forEach(function (form) {
		form.addEventListener("submit", function (e) {
			e.preventDefault();
			const form = this;
			let formData = new FormData(form);
			const formName = form.name;
			const fileInput = form.querySelector("input[type=file]");

			formData.append("action", "send_mail");

			if (formName) {
				formData.append("form_name", formName);
			} else {
				return;
			}

			if (fileInput) {
				Array.from(fileInput.files).forEach((file, key) => {
					formData.append(key.toString(), file);
				});
			}

			const response = fetch(adem_ajax.url, {
				method: "POST",
				body: formData,
			})
				.then((response) => response.text())
				.then((data) => {
					Fancybox.close(true);
					form.reset();
					setTimeout(function () {
						Fancybox.show([
							{
								src: "#success",
								type: "inline",
							},
						]);
					}, 100);
				})
				.catch((error) => {
					console.error("Error:", error);
				});
		});
	});
}

function setFileName() {
	const fileInputContainers = document.querySelectorAll('.js-file-input');
	if (fileInputContainers) {
		fileInputContainers.forEach(function (container) {
			let input = container.querySelector('input[type=file]');
			let label = container.querySelector('label');
			input.addEventListener("change", function () {
				label.textContent = this.files[0].name;
			});
		});
	}
}

function tabs() {
	const tabsLists = document.querySelectorAll(".js-tabs");
	if (tabsLists) {
		tabsLists.forEach(function (tabsList) {
			bindUIFunctions(tabsList);
		});
	}

	function bindUIFunctions(tabsList) {
		tabsList.addEventListener("click", function (e) {
			const tabItem = e.target.closest("li");
			if (tabItem.classList.contains("active")) {
				toggleMobileMenu(tabItem);
			}
			if (!tabItem.classList.contains("active") && e.target !== tabsList) {
				changeTab(tabItem);
			}
		});
	}

	function changeTab(tabItem) {
		const tabContainer = document.querySelector(
			"#" + tabItem.getAttribute("data-tab")
		);

		tabItem.classList.add("active");
		get_siblings(tabItem).forEach(function (tab) {
			tab.classList.remove("active");
		});

		tabContainer.classList.add("active");
		get_siblings(tabContainer).forEach(function (tab_container) {
			tab_container.classList.remove("active");
		});

		tabItem.parentNode.classList.remove("open");
	}

	function toggleMobileMenu(tabItem) {
		tabItem.parentNode.classList.toggle("open");
	}
}

//Ajax

function showMorePosts() {
	const show_more_btn = document.querySelector(".js-show-more");

	if (!show_more_btn) return;

	show_more_btn.addEventListener("click", function (e) {
		e.stopImmediatePropagation();
		const container = document.querySelector(".js-show-more-container");
		this.textContent = "Загрузка...";

		const response = fetch(adem_ajax.url, {
			method: "POST",
			headers: {
				"Content-Type": "application/x-www-form-urlencoded;charset=UTF-8",
			},
			body: new URLSearchParams({
				action: "load_more",
				query: posts,
				page: current_page,
			}),
		})
			.then((response) => response.text())
			.then((data) => {
				this.innerHTML = this.dataset.text;
				container.insertAdjacentHTML("beforeend", data);
				current_page++;
				if (current_page === max_pages) this.remove();
			})
			.catch((error) => {
				console.error("Error:", error);
			});
	});
}

document.addEventListener("DOMContentLoaded", function () {
	setHeaderScrollClass();

	setFileName();

	sendForm();

	setTelMask();

	tabs();

	showMorePosts();
});

//Fancybox

try {
	Fancybox.bind("[data-fancybox]", {
		animated: false,
	});

	Fancybox.bind('[data-src="#order-calc"]', {
		defaultDisplay: "block",
		dragToClose: false,
	});
} catch (error) {
	console.log(error);
}

//Swiper

//Слайдер blocks/rest

const restCarousel = document.querySelector(".rest__wrapper");

if (restCarousel) {
	let papersSwiper = new Swiper(restCarousel, {
		navigation: {
			nextEl: ".rest__next",
			prevEl: ".rest__prev",
		},
		breakpoints: {
			1440: {
				slidesPerView: 4,
				centeredSlides: false,
			},
			992: {
				slidesPerView: 3,
				centeredSlides: false,
			},
			769: {
				slidesPerView: 2,
				centeredSlides: false,
			},
			577: {
				centeredSlides: false,
			},
		},
		slidesPerView: "auto",
		centeredSlides: true,
		spaceBetween: 25,
	});
}

// Функционал шапки сайта

document.addEventListener("DOMContentLoaded", function(e) {
	const header = document.querySelector('.header');

	if (header) {
		const headerBurger = header.querySelectorAll('.header__burger');
		const headerDrop = header.querySelector('.header__drop');

		headerBurger.forEach(burger => {
			burger.onclick = () => {
				burger.classList.toggle('active');
				headerDrop.classList.toggle('active');
			}
		});

		// drop.addEventListener('mouseup', (e) => {
		// 	if (drop === e.target) {
		// 		dropCloser();
		// 	}
		// });
	}
})

//Функционал слайдеров .range

const calcRanges = document.querySelectorAll('.range');

if (calcRanges) {
	calcRanges.forEach(calcRange => {
		let calcSlider = calcRange.querySelector('.range-slider');
		let calcSelect = calcRange.querySelector('.range-select');
		let calcThumb = calcRange.querySelector('.range-thumb');
		let calcValue = calcRange.querySelector('.range-value');
		let calcBar = calcRange.querySelector('.range-bar');

		calcValue.innerHTML = calcSlider.value;

		calcSlider.oninput = function() {
			calcValue.innerHTML = this.value;
			let thumbHalfWidth = calcThumb.offsetWidth / 2;
			let thumbPosition = (((this.value - this.min) / (this.max - this.min)) * ((calcSlider.offsetWidth - thumbHalfWidth) - thumbHalfWidth)) + thumbHalfWidth;
			calcSelect.style.left = thumbPosition + 'px';
			calcBar.style.width = thumbPosition + 'px';
		}
	});
}

//Функционал блока "faq.php" (Аккордион)

const accordions = document.querySelectorAll('.faq__item');
const accodrionBtns = document.querySelectorAll('.js-faq-accordion');

if (accordions) {
	const accordionClose = () => {
		for (let accordion of accordions) {
			let accodrionBtn = accordion.querySelector('.js-faq-accordion');
			let accordionAnswer = accordion.querySelector('.faq__answer');

			accordionAnswer.style.maxHeight = null;
			accodrionBtn.classList.remove('active');
		}
	}

	accodrionBtns.forEach(btn => {
		btn.addEventListener('click', () => {
			if (btn.classList.contains('active')) {
				accordionClose();
			} else {
				accordionClose();
				btn.classList.add('active');
				btn.nextElementSibling.style.maxHeight = btn.nextElementSibling.scrollHeight + "px";
			}
		})
	});
}

//Функционал аккордиона блока "services.php"

const services = document.querySelector('.services');

if (services) {
	let accBtns = services.querySelectorAll('.services__accordion');
	let servicesItems = services.querySelectorAll('.services__item');

	let accCloser = function() {
		for (let service of servicesItems) {
			let btn = service.querySelector('.services__accordion');

			service.classList.remove('active');
			btn.classList.remove('active');
			accBtnTextChecker(btn);
		}
	}

	let accBtnTextChecker = function (btn) {
		if (btn.classList.contains('active')) {
			btn.textContent = 'Свернуть';
		} else {
			btn.textContent = 'Об услуге';
		}
	}

	accBtns.forEach(btn => {
		btn.addEventListener('click', function() {
			if (this.classList.contains('active')) {
				accCloser();
				accBtnTextChecker(this);
			} else {
				accCloser();
				this.classList.add('active');
				this.parentNode.classList.add('active');
				accBtnTextChecker(this);

				this.parentNode.scrollIntoView({
					behavior: 'smooth',
					block: 'center'
				});
			}
		})
	});
}

//