// Prototype for IE 11 "Object doesn't support property or method 'matches'"
if (!Element.prototype.matches){
  Element.prototype.matches = Element.prototype.msMatchesSelector;
}

// Show the loading animation
function startLoading(){
  document.querySelector('#loadingArea').classList.remove("noDisplay");
}

// Hide the loading animation
function doneLoading(){
  document.querySelector('#loadingArea').classList.add("noDisplay");
}

// These are the main content areas that we'll change or add to
const cardBody = document.querySelector('#contentArea');
const cardFooter = document.querySelector('#cardFooter');
const sectionTitle = document.querySelector('#sectionTitle');

// This is our starting point - make sure this is a valid key in the JSON
const startingCard = "card0";

// We'll update the contents of this array as we navigate through the app - Used for the history/go back
let cardHistory = [];

// Where our data/content comes from 
const requestURL = 'content.json';

// connect to the JSON
let request = new XMLHttpRequest();
request.open('GET', requestURL);
request.responseType = 'text';
request.send();

// Load the first card when the page loads
request.onload = function() {
  populateCard(startingCard); // start populating content from our initial screen
}

// Populate the contents onto the card from JSON
function populateCard(key){
  // load the JSON for use
  const appText = request.response;
  const decisionTree = JSON.parse(appText);
  
  // Strings
  const s_startOver = "Start Over";
  const s_goBack = "Go back to previous card";
  const s_doesNotExist = "Requested Card Does Not Exist";
  const s_reportError = "Please report this error. "; // Puposely left a space at the end of the string
  const s_clickToStartOver = "Click here to start over";

  // Define our main URL (used in the event of an error)
  const appURL = "http://forms.intrado.com/msft_cisco_decision_tree/";

  //console.log(decisionTree);
  //console.log( decisionTree.cards[0][key] );

  if( decisionTree.cards[0][key] ){ // If the specified key exists, proceed...
    const myTitle = document.createElement('h5');
    const myBody = document.createElement('div');
    const choiceContainer = document.createElement('p');
    const cardChoices = decisionTree.cards[0][key]['choices'];
    const appNav = document.createElement('p');
    const startOver = document.createElement('a');
    const lastCard = document.createElement('a');
    const currentCard = document.createElement('p');

    // Add the current card into our history
    cardHistory.push(key);

    // Create heading
    myTitle.className = "card-title";
    myTitle.textContent = decisionTree.cards[0][key]['cardTitle']; // We shouldn't need HTML in the heading, so .textContent should be sufficient
  
    // Create main content
    myBody.className = "card-text";
    myBody.innerHTML = decisionTree.cards[0][key]['cardBody']; // The body however will need HTML for additional formatting and functionality

    // Loop through our choices and create buttons/links for each (if they exist)
    // const objCount = Object.keys(decisionTree.cards[0]).length;
    for(let i=0;i<cardChoices.length;i++){
      const suggestedDest = cardChoices[i]['leadsTo'];
      if( suggestedDest in decisionTree.cards[0] ){ // check to see if the 'leadsTo' is a valid item within the JSON before adding
        const myChoices = document.createElement('a');
        myChoices.className = "btn btn-primary btn-navigate";
        myChoices.text = cardChoices[i]['btnText'];
        myChoices.href = cardChoices[i]['leadsTo'];
        choiceContainer.appendChild(myChoices); // add the <a> to the <p>
      }
    }

    // Footer paragraph (left)
    appNav.className = "appNav";

    // Start Over and Go Back links
    if(key!=startingCard){ // We don't need to show these on the initial screen
      // Start Over link
      startOver.text = s_startOver;
      startOver.className = "btn-navigate btn-startover card-link";
      startOver.href = startingCard;
      appNav.appendChild(startOver); // add the <a> to the <p>

      // History / Go Back Link
      const lastItem = cardHistory.slice(-2)[0]; // current card is -1, previous card is -2
      lastCard.href = lastItem;
      lastCard.text = s_goBack;
      lastCard.className = "btn-navigate btn-goback card-link";
      appNav.appendChild(lastCard); // add the <a> to the <p>
    }

    // Print the current card
    currentCard.className = "currentCard";
    currentCard.textContent = key;

    // Remove the 'loading' screen
    doneLoading();

    // Add content to DOM
    sectionTitle.textContent = decisionTree.cards[0][key]['cardSection']; // Page Heading
    cardBody.appendChild(myTitle); // In-Card Heading
    cardBody.appendChild(myBody); // Main Content
    cardBody.appendChild(choiceContainer); // Decision Choices
    cardFooter.appendChild(appNav); // Start Over and History <p> (may be empty)
    cardFooter.appendChild(currentCard); // Display an unobtrusive reference to the current card to aid in debugging (could remove for prod.)
  }else{ // If the specified key does not exist, fail...
    const currentCard = document.createElement('p');
    const startOverLink = document.createElement('a');
    sectionTitle.textContent = s_doesNotExist;

    // Populate an error message
    currentCard.className = "errorMsg";
    currentCard.textContent = s_reportError;

    // Populate a 'start over' link
    startOverLink.href = appURL;
    startOverLink.text = s_clickToStartOver;
    currentCard.appendChild(startOverLink);

    // Remove the 'loading' screen
    doneLoading();

    // Add content to DOM
    cardBody.appendChild(currentCard);
  }
}

function updateCard(key) {
  // clear the contents of the current card
  sectionTitle.textContent = "";
  cardBody.innerHTML="";
  cardFooter.innerHTML="";

  // Add the 'loading' screen
  startLoading();

  // Call our function to populate content from the specified key
  populateCard(key);
}

document.addEventListener('click', function (event) {
	if (!event.target.matches('.btn-navigate')) return; // See 'matches' prototype
	event.preventDefault();
  const key = event.target.attributes.href.value;
  updateCard(key);
}, false);
