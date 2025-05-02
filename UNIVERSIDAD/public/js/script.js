// Array de objetos que contiene la información de cada curso
const courses = [
    {
      id: 'course1',
      title: 'Curso de Marketing Digital',
      image: '../public/img/curso_marketing.jpg',
      thumb: '../public/img/curso_marketing.jpg',
      description: 'Aprende todo sobre marketing digital, desde SEO hasta estrategias avanzadas.'
    },
    {
      id: 'course2',
      title: 'Curso de Desarrollo Web',
      image: '../public/img/curso_desarrolloWeb.jpg',
      thumb: '../public/img/curso_desarrolloWeb.jpg',
      description: 'Aprende HTML, CSS, JavaScript y más para crear sitios web modernos y funcionales.'
    },
    {
      id: 'course3',
      title: 'Curso de Gestión de Proyectos',
      image: '../public/img/curso_gestionDeProyectos.jpg',
      thumb: '../public/img/curso_gestionDeProyectos.jpg',
      description: 'Domina la planificación, ejecución y monitoreo de proyectos exitosos.'
    },
    {
      id: 'course4',
      title: 'Curso de Fotografía Profesional',
      image: '../public/img/curso_fotografia.jpg',
      thumb: '../public/img/curso_fotografia.jpg',
      description: 'Aprende desde los fundamentos hasta técnicas avanzadas para convertirte en fotógrafo profesional.'
    },
    {
      id: 'course5',
      title: 'Curso de Idiomas Online',
      image: '../public/img/curso_idiomas.jpg',
      thumb: '../public/img/curso_idiomas.jpg',
      description: 'Estudia inglés, francés, alemán y más desde la comodidad de tu hogar.'
    },
    {
      id: 'course6',
      title: 'Curso de Hacking Online',
      image: '../public/img/curso_hacking.jpg',
      thumb: '../public/img/curso_hacking.jpg',
      description: 'Aprende la tecnicas mas avanzadas en hacking etico, para poder desarrollar al maximo tu capacidad.'
    }
  ];
  // Obtenemos el contenedor donde se insertarán los cursos
  const courseContainer = document.getElementById('courseContainer');

  // Iteramos sobre cada curso para crear dinámicamente su card 
  courses.forEach(course => {
    const col = document.createElement('div');
    col.className = 'col-md-4 mb-4';

    // Generamos la tarjeta del curso con imagen, titulo y descripcion
    col.innerHTML = `
      <div class="card" role="button" tabindex="0" onclick="openCourse('${course.id}')" onkeypress="if(event.key === 'Enter') openCourse('${course.id}')">
        <img src="${course.thumb}" class="card-img-top" alt="${course.title}">
        <div class="card-body">
          <h5 class="card-title">${course.title}</h5>
          <p class="card-text">${course.description}</p>
        </div>
      </div>
    `;
    // Agregamos la tarjeta al contenedor en el DOM
    courseContainer.appendChild(col);
  });
   // ejecuta el sidebar al hacer clic en una tarjeta
  function openCourse(courseId) {
    const course = courses.find(c => c.id === courseId); // Buscamos el curso por ID
    const sidebar = document.getElementById('mySidebar');
    if (course) {
      sidebar.style.display = 'block'; // Mostramos el sidebar (antes de animar)

      // realentizamos el CSS de la animación asi se activa correctamente
      setTimeout(() => {
        sidebar.classList.add('show'); // Aplica clase que mueve el sidebar visible
      }, 10);

      sidebar.setAttribute('aria-hidden', 'false'); // Mejora accesibilidad
     
      document.getElementById('courseTitle').innerText = course.title;
      document.getElementById('courseImage').src = course.image;
      document.getElementById('courseImage').alt = course.title;
      document.getElementById('courseDescription').innerText = course.description;
      
      console.log('Imagen del curso:', course.image); // Verifica la ruta de la imagen
    
    }else {
      console.error('Curso no encontrado:', courseId); // Manejo de error si el curso no se encuentra 
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
