//Created elements including crime committed and case ID
let crimeCInput = document.createElement("input");      //Input field for Crime Committed
let crimeCLabel = document.createElement("label");      //Label for input field Crime Committed  
let caseIInput = document.createElement("input");      //Input field for Case ID
let caseILabel = document.createElement("label");      //label for input field for Case ID
let split = document.createElement("br");                 //HTML element for splitting each element created into a new line

//Adding content to created children
crimeCInput.innerHTML += '<input id = "crimeC">';
crimeCLabel.innerHTML += '<label for = "crimeC"> Crime Committed</label>';
caseIInput.innerHTML += '<input id = "caseI">';
caseILabel.innerHTML += '<label for= "caseI"> Case ID </label>';

//Set name attribute for children
crimeCInput.setAttribute("name", "crimeC");
caseIInput.setAttribute("name", "caseid");

//Array of children for setting classes and general type attribute.
let children = [
    crimeCInput,
    crimeCLabel,
    caseIInput,
    caseILabel,
   
  ];

  //For loop used for setting general HTML attributes and CSS classes to the created children
for (let i = 0; i < children.length; i++) {
    if (children[i].nodeName === "INPUT") {
      children[i].classList.add("form-control");
      children[i].setAttribute("type", "text");
      children[i].insertAdjacentElement("afterend", split);
    }
}
//Element to append
let reference = document.getElementById("parent");

//Variable for select box, being clicked
let pick = document.getElementById("crimec");

//Function for providing options upon selection of Yes with onchange event for <select> tags.
pick.onchange = function ()
{
  if (pick.value === "yes") {
    pick.insertAdjacentElement("afterend", split);
    reference.appendChild(crimeCLabel);
    reference.appendChild(crimeCInput);
    reference.appendChild(caseILabel);
    reference.appendChild(caseIInput);
   
  } else{
    reference.removeChild(crimeCLabel);
    reference.removeChild(crimeCInput);
    reference.removeChild(caseILabel);
    reference.removeChild(caseIInput);
   
    reference.removeChild(split);
  }
}
formSubmit.onclick = function validate()
{
  let fname = document.getElementById("fname").value;
  let lname = document.getElementById("lname").value;
  

  //Regex for verification of name
  let name_format = /^[a-zA-Z].*[\s\.]*$/i; //Single name format. For a name with space, use this: /^[a-zA-Z].*[\s\.]*$/gi
 


  //Conditionals for validation. Doesn't include email
  confirm("Do you want to submit this form?");
    if (!name_format.test(fname)) {
      alert("Please enter a valid First name");
      event.preventDefault();
    }


    if (!name_format.test(lname)) {
      alert("Please enter a valid Last name");
      event.preventDefault();
    }

    
}
formSubmit.addEventListener("click", confirmOption);