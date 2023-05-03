const radioButtons = document.querySelectorAll('input[type="radio"]');

radioButtons.forEach(button => {
  button.addEventListener('change', event => {
    // Get the value of the selected radio button
    const selectedValue = event.target.value;
    
    // Perform an action based on the selected radio button value
    switch (selectedValue) {
      case 'id':
        // Do something for the ID radio button
        break;
      case 'when':
        // Do something for the When radio button
        break;
      // Handle other cases as needed
    }
  });
});