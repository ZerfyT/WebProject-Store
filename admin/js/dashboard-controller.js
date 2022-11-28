const btInsert = document.getElementById("bt-insert");
const btSelect = document.getElementById("bt-select");
const btDelete = document.getElementById("bt-delete");

btInsert.addEventListener("click", () => {
	const formInsert = document.getElementById("form-insert");
	const formContainer = document.getElementById("form-container");
	if (formInsert.style.display == "none") {
		formInsert.style.display = "block";
		formContainer.style.visibility = "visible";
	} else {
		formInsert.style.display = "none";
		formContainer.style.visibility = "hidden";
	}
});

btSelect.addEventListener("click", () => {});
btDelete.addEventListener("click", () => {});

// Style Form Container
// function addStyleToFormContainer(){
//     const formContainer = document.getElementById("form-container");
//     formContainer.style.border = "1px solid var(--bs-gray-200)";
//     formContainer.style.boxShadow = "0px 0px 4px rgba(63, 63, 63, 0.678)";

//     if (formInsert.style.display == "none") {
// 		formInsert.style.display = "block";
// 	} else {
// 		formInsert.style.display = "none";
// 	}
// }
