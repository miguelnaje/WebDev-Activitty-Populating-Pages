/*!
    * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2023 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {
    // Select the toggle button
    const sidebarToggle = document.body.querySelector('#sidebarToggle');

    if (sidebarToggle) {
        // Check if toggle state is stored in localStorage
        if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
            document.body.classList.add('sb-sidenav-toggled');
        }

        // Add click event listener
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();

            // Toggle the sidebar class
            document.body.classList.toggle('sb-sidenav-toggled');

            // Store toggle state in localStorage
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }
});



