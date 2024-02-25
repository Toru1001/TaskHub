const body = document.querySelector("body"),
      sidebar = body.querySelector(".sidebar"),
      header = body.querySelector(".header-body"),
      container = body.querySelector(".content-container"),
      toggle = body.querySelector(".toggle");

    toggle.addEventListener("click", () => {
      sidebar.classList.toggle("close");
    });
    toggle.addEventListener("click", () => {
      header.classList.toggle("close");
    });
    toggle.addEventListener("click", () => {
      container.classList.toggle("close");
    });

    function openPopup() {
      document.getElementById('popup-container').style.display = 'block';
    }

    function closePopup() {
      document.getElementById('popup-container').style.display = 'none';
    }

    function menuToggle(){
      const toggleMenu = document.querySelector(".prof-menu");
      toggleMenu.classList.toggle("active");
    }