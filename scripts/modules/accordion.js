const pxAccordion = (elementSelector) => {
	const selectedElements = document.querySelectorAll(elementSelector);
	selectedElements.forEach((item) => {
	  pxAccordionInit(item);
	});
  };

  const pxAccordionInit = (element) => {
	const selectedElement = element;
	const accHeads = selectedElement.querySelectorAll(
	  ".px-acc-item .px-acc-head"
	);
	accHeads.forEach((headItem) => {
	  headItem.addEventListener("click", (event) => {
		const accItem = event.target.parentElement;
		const accBody = event.target.nextElementSibling;
		let accBodyHeight = accBody.scrollHeight;

		accBody.addEventListener("transitionend", () => {
		  if (accItem.classList.contains("active")) accBody.style.height = "auto";
		});
		accItem.classList.toggle("active");
		if (accItem.classList.contains("active")) {
		  accBody.style.height = accBodyHeight + "px";
		} else {
		  requestAnimationFrame(() => {
			accBodyHeight = accBody.scrollHeight;
			accBody.style.height = accBodyHeight + "px";
			requestAnimationFrame(() => {
			  accBody.style.height = 0 + "px";
			});
		  });
		}
	  });
	});
  };

  pxAccordion("#px-acc001");
