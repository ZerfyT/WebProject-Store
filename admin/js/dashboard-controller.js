function controlFormVisibility(event, formId) {
	// Get Form Container
	const formContainer = document.getElementById("form-container");
	formContainer.style.visibility = "hidden";

	// Get all Form Elements.
	const formList = document.querySelectorAll(".form");
	for (let i = 0; i < formList.length; i++) {
		formList[i].style.display = "none";
	}

	// Get all controller buttons
	const buttonList = document.querySelectorAll("#controller-cards .btn");
	for (let i = 0; i < buttonList.length; i++) {
		// removeClass(buttonList[i], "active");
		buttonList[i].className = buttonList[i].className.replace(
			" active",
			""
		);
	}

	document.getElementById(formId).style.display = "block";
	document.getElementById("form-container").style.visibility = "visible";
	// addClass(event.currentTarget, "active");
	event.currentTarget.className += " active";
}

// If element doesn't have className, add it
// function addClass(element, className) {
// 	if (!element.classList.contains(className)) {
// 		element.className = trim(element.className + " " + className);
// 	}
// }

// // If element has className, remove it
// function removeClass(element, className) {
// 	if (element.classList.contains(className)) {
// 		element.className = trim(
// 			(" " + element.className + " ")
// 				.split(" " + className + " ")
// 				.join(" ")
// 		);
// 	}
// }

// // Remove leading and trainling white space and replace multiple spaces with single
// function trim(s) {
// 	return s.replace(/\s+/g, " ").replace(/^\s|\s$/g, "");
// }

// Style Form Container
// function addStyleToFormContainer(){
//     const formContainer = document.getElementById("form-container");
//     formContainer.style.border = "1px solid var(--bs-gray-200)";
//     formContainer.style.boxShadow = "0px 0px 4px rgba(63, 63, 63, 0.678)";

//     if (formNode.style.display == "none") {
// 		formNode.style.display = "block";
// 	} else {
// 		formNode.style.display = "none";
// 	}
// }

function createCardView(title, desc, unit_pr, unit, stock, imgs) {
	var tasks = [
		{
			title: "home",
			color: "blue",
		},
		{
			title: "city",
			color: "green",
		},
	];

	let cardContainer;

	let createTaskCard = (task) => {
		let card = document.createElement("div");
		card.className = "card shadow cursor-pointer";

		let cardBody = document.createElement("div");
		cardBody.className = "card-body";

		let title = document.createElement("h5");
		title.innerText = task.title;
		title.className = "card-title";

		let color = document.createElement("div");
		color.innerText = task.color;
		color.className = "card-color";

		cardBody.appendChild(title);
		cardBody.appendChild(color);
		card.appendChild(cardBody);
		cardContainer.appendChild(card);
	};

	let initListOfTasks = () => {
		if (cardContainer) {
			document
				.getElementById("card-container")
				.replaceWith(cardContainer);
			return;
		}

		cardContainer = document.getElementById("card-container");
		tasks.forEach((task) => {
			createTaskCard(task);
		});
	};

	initListOfTasks();
}
