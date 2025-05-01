
const CarrerasDeGrado = [
    {
        id: 'carrera1',
        title: 'Ingenieria en Sistemas',
        image: '../public/img/Ing-Sistema.jpg',
        thumb: '../public/img/Ing-Sistema.jpg',
        description: 'La Ingeniería en Sistemas se dedica al diseño, implementación y gestión de sistemas informáticos. Los ingenieros en sistemas desarrollan software y soluciones tecnológicas, asegurando que los sistemas funcionen de manera eficiente y satisfagan las necesidades de los usuarios y las organizaciones.'
    },
    {
        id: 'carrera2',
        title: 'Ingenieria en Informatica',
        image: '../public/img/Ing-Informatica.jpg.jpg',
        thumb: '../public/img/Ing-Informatica.jpg.jpg',
        description: 'La Ingeniería en Informática se enfoca en la creación y gestión de software y aplicaciones. Los ingenieros en informática desarrollan soluciones digitales, desde aplicaciones móviles hasta sistemas complejos, y se especializan en áreas como inteligencia artificial, bases de datos y seguridad informática.'
    },
    {
        id: 'carrera3',
        title: 'Ingenieria Electronica',
        image: '../public/img/Ing-Electronica.jpg',
        thumb: '../public/img/Ing-Electronica.jpg',
        description: 'La Ingeniería Electrónica se centra en el desarrollo y diseño de circuitos y sistemas electrónicos. Los ingenieros electrónicos trabajan en áreas como comunicaciones, automatización y control, utilizando su conocimiento para innovar en dispositivos y tecnologías que mejoran la vida cotidiana.'
    },
    {
        id: 'carrera4',
        title: 'Ingenieria Industrial',
        image: '../public/img/Ing-Iing-industrial.jpg',
        thumb: '../public/img/Ing-Iing-industrial.jpg',
        description: 'La Ingeniería Industrial busca optimizar procesos y sistemas en entornos productivos y organizacionales. Los ingenieros industriales analizan y mejoran la eficiencia de las operaciones, gestionando recursos humanos, materiales y tecnológicos para maximizar la productividad y reducir costos.'
    },
    {
        id: 'carrera5',
        title: 'Ingenieria Mecanica',
        image: '../public/img/Ing-Mecanica.jpg',
        thumb: '../public/img/Ing-Mecanica.jpg',
        description: 'La Ingeniería Mecánica se ocupa del diseño, análisis y fabricación de maquinaria y componentes mecánicos. Los ingenieros mecánicos aplican principios de física y materiales para crear soluciones innovadoras en diversas industrias, desde automotriz hasta aeroespacial.'
    },   
    {
        id: 'carrera6',
        title: 'Ingenieria Civil',
        image: '../public/img/Ing-Civil.jpg',
        thumb: '../public/img/Ing-Civil.jpg',
        description: 'La Ingeniería Civil se enfoca en el diseño, construcción y mantenimiento de infraestructuras, como edificios, puentes y caminos. Los ingenieros civiles aplican principios científicos y matemáticos para resolver problemas relacionados con la construcción y el medio ambiente, garantizando la seguridad y funcionalidad de los proyectos.'
    }
  ];

  
   // Obtenemos el contenedor donde se insertarán los cursos
   const CarrerasDeGradoContainer = document.getElementById('CarrerasDeGradoContainer');

   // Iteramos sobre cada curso para crear dinámicamente su card 
   CarrerasDeGradoContainer.forEach(Carrera => {
     const col = document.createElement('div');
     col.className = 'col-md-4 mb-4';
 
     // Generamos la tarjeta del curso con imagen, titulo y descripcion
     col.innerHTML = `
       <div class="card" role="button" tabindex="0" onclick="openCourse('${CarrerasDeGrado.id}')" onkeypress="if(event.key === 'Enter') openCourse('${CarrerasDeGrado.id}')">
         <img src="${Carrera.thumb}" class="card-img-top" alt="${course.title}">
         <div class="card-body">
           <h5 class="card-title">${Carrera.title}</h5>
           <p class="card-text">${Carrera.description}</p>
         </div>
       </div>
     `;
     // Agregamos la tarjeta al contenedor en el DOM
     CarrerasDeGradoContainer.appendChild(col);
   });
    // ejecuta el sidebar al hacer clic en una tarjeta
   function openCourse(CarrerasDeGradoId) {
     const CarrerasDeGrado = CarrerasDeGrado.find(c => c.id === CarrerasDeGradoId); // Buscamos el curso por ID
     const sidebar = document.getElementById('mySidebar');
     if (CarrerasDeGrado) {
       sidebar.style.display = 'block'; // Mostramos el sidebar (antes de animar)
 
       // realentizamos el CSS de la animación asi se activa correctamente
       setTimeout(() => {
         sidebar.classList.add('show'); // Aplica clase que mueve el sidebar visible
       }, 10);
       sidebar.setAttribute('aria-hidden', 'false'); // Mejora accesibilidad
       document.getElementById('CarrerasDeGradoTitle').innerText = CarrerasDeGrado.title;
       document.getElementById('CarrerasDeGradoImage').src = CarrerasDeGrado.image;
       document.getElementById('CarrerasDeGradoImage').alt = CarrerasDeGrado.title;
       document.getElementById('CarrerasDeGradoDescription').innerText = CarrerasDeGrado.description;
     }
   }
   // Cerrar el sidebar
   function closeCourse() {
     const sidebar = document.getElementById('mySidebar');
     sidebar.classList.remove('show'); // Ocultamos el sidebar con animacion
     sidebar.setAttribute('aria-hidden', 'true'); // Mejoramos su accesibilidad
 
     // Esperamos para ocultarlo completamente
     setTimeout(() => {
       sidebar.style.display = 'none';
     }, 500);
   }