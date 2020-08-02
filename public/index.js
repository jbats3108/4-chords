const toggleBtn = document.getElementById('toggle-btn');

const disclaimerText = document.getElementById('disclaimer-text');

toggleBtn.addEventListener('click', () => {
	if (
		disclaimerText.style.display === 'none' ||
		disclaimerText.style.display === ''
	) {
		toggleBtn.textContent = 'DISCLAIMER [ - ]';
		return (disclaimerText.style.display = 'block');
	}
	toggleBtn.textContent = 'DISCLAIMER [ + ]';
	return (disclaimerText.style.display = 'none');
});
