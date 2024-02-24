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

    function openCreatePopup() {
      document.getElementById('popup-container-create').style.display = 'block';
    }

    function closeCreatePopup() {
      document.getElementById('popup-container-create').style.display = 'none';
    }

    function openDetailsPopup() {
        document.getElementById('popup-container-details').style.display = 'block';
      }
  
      function closeDetailsPopup() {
        document.getElementById('popup-container-details').style.display = 'none';
      }

      function post() {
        $(document).ready(function () {
            $('.data-link').click(function (e) {
                e.preventDefault();
                var linkdata = $(this).find('.details').text();
                
                $.post('store_datas.php', {mydata:linkdata}, 
                function(data){
                    $('#result').html(data);
                });
            });
        });
    }