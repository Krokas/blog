const confirmationRequiredActions = document.querySelectorAll("[data-confirm]");

confirmationRequiredActions.forEach((confirmBtn) => {
    confirmBtn.addEventListener("click", (event) => {
        event.preventDefault();
        if (confirm(confirmBtn.dataset.confirm))
            window.location.href = confirmBtn.href;
    });
});
