

        fetch('/categories', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
            },
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la autenticación');
            }
            return response.json();
        })
        .then(data => {
            const menu=document.getElementById('menu');
            data.category.data.forEach(element => {
                const link=document.createElement('a');
                link.href="/alimentos"+'?category='+element.id;
                link.textContent=element.category;
                menu.appendChild(link);
                var img=document.createElement('img');
                img.src='https://ingenieriademenu.com/wp-content/uploads/2022/04/Objetivos-de-los-servicios-de-alimentacion.jpg.webp';
                link.appendChild(img);

            });
            console.log('success'+JSON.stringify(data.category.data, null, 2));
        })
        .catch(error => {
            console.error('Error:', error);

        });
