// ✅ VARIABLES
const celsiusInput = document.querySelector("#celsius");
const convertButton = document.querySelector("#convert-button");
const saveButton = document.querySelector("#save-button");
const resultElement = document.querySelector("#fahrenheit-result");
const resultsElement = document.querySelector("#save-results");

let currentEntry = null;
let results = [];


// ✅ FUNCTIONS

function convert() {
    const celsius = parseFloat(celsiusInput.value);

    if (Number.isNaN(celsius)) {
        resultElement.textContent = "Please enter a valid number.";
        return;
    }

    const fahrenheit = (celsius * 9) / 5 + 32;

    currentEntry = `${celsius}°C = ${fahrenheit.toFixed(2)}°F`;

    resultElement.textContent = currentEntry;
}

function save() {
    if (!currentEntry) return;

    results.unshift(currentEntry);
    results = results.slice(0, 10);

    renderResults();
}

function renderResults() {
    while (resultsElement.firstChild) {
        resultsElement.removeChild(resultsElement.firstChild);
    }

    results.forEach(item => {
        const li = document.createElement("li");
        li.textContent = item;
        resultsElement.appendChild(li);
    });
}

convertButton.addEventListener("click", convert);
saveButton.addEventListener("click", save);