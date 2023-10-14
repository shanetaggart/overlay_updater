window.addEventListener('load', (event) => {

    // Query and store the two <select> elements that need <option> elements added.
    let characterSelectLists = document.querySelectorAll('.characters');

    // Iterate through the <select> elements.
    characterSelectLists.forEach((select) => {
        // Iterate through the characters.
        characters.forEach((character) => {
            // Create a new <option> element.
            let newOption = document.createElement('option');
            // Set the innerText of the new <option> element to the character name.
            newOption.innerText = character;
            // Append the new <option> element as a child of the <select> element.
            select.append(newOption);
        });
    });
});