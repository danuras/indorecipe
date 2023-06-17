document.querySelector('search-form').addEventListener('submit', function(e) {
            e.preventDefault();
            var searchInput = document.getElementById('searchInput').value;
            window.location.href = '{{ route('search-result', ':search') }}'.replace(':search', searchInput);
        });