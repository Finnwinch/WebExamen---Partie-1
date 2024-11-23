const toggleButton = document.getElementById('toggleDeleteForm');
const deleteForm = document.getElementById('deleteForm');

toggleButton.addEventListener('click', () => {
    if (deleteForm.style.display === 'none' || deleteForm.style.display === '') {
        deleteForm.style.display = 'flex'; // Affiche le formulaire
        toggleButton.style.display = 'none'; // Cache le bouton
        toggleButton.textContent = 'Submit'; // Change le texte du bouton
    } else {
        deleteForm.submit(); // Soumet le formulaire
    }
});
