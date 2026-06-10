const searchInput = document.getElementById('user-search');
const userList = document.getElementById('user-list');

if (searchInput && userList) {
    let debounceTimer;

    searchInput.addEventListener('input', () => {
        clearTimeout(debounceTimer);

        debounceTimer = setTimeout(async () => {
            const search = searchInput.value.trim();
            const url = `/?search=${encodeURIComponent(search)}`;

            const response = await fetch(url, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' },
            });

            userList.innerHTML = await response.text();

            // Keep the URL bar in sync so the result is shareable/refreshable.
            window.history.replaceState(null, '', search ? url : '/');
        }, 300);
    });
}
