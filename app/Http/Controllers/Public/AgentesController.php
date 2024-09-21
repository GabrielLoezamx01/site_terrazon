<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;

class AgentesController extends Controller
{
    protected $key_cache_home_properties;
    protected $key_cache_viewed_properties;
    protected $key_cache_recomended_properties;
    protected $recentPropertiesService;
    protected $filtersService;
    function __construct() {}
    public function index()
    {
        $agentes = [
            [
                "nombre" => "Ángel<br>Poot",
                "puesto" => "Team Leader ",
                "info" => "Nuestro team leader es un profesional altamente experimentado en el sector inmobiliario y en la gestión de proyectos inmobiliarios. Con más de una década de experiencia, ha liderado equipos multidisciplinarios hacia el éxito, combinando habilidades técnicas avanzadas con una visión estratégica clara. Su compromiso con la excelencia, la innovación y la satisfacción del cliente lo convierte en un líder ejemplar, capaz de guiar al equipo de Terrazon hacia nuevas alturas en el mercado.",
                "picture" => asset('images/agentes/AP.png')
            ],
            [
                "nombre" => "Giovanna<br>Galera",
                "puesto" => "sales & communication<br>manager",
                "info" => "Como manager de ventas y comunicación en Terrazon con más de 5 años de experiencia en el ramo inmobiliario, poseo una trayectoria en la creación e implementación de estrategias efectivas para impulsar el crecimiento y la visibilidad de la empresa. Mi experiencia abarca tanto el desarrollo de equipos de ventas de alto rendimiento como la gestión de campañas de comunicación integradas que fortalecen la imagen de la marca y fomentan relaciones duraderas con los clientes.",
                "picture" => asset('images/agentes/GG.png')
            ],
            [
                "nombre" => "Amir<br>Aguilar",
                "puesto" => "Information Technology<br>manager",
                "info" => "Como manager de IT en Terrazon, cuento con más de 5 años de experiencia en la gestión de tecnología de la información y en la implementación de soluciones tecnológicas que optimizan los procesos empresariales y mejoran la eficiencia operativa. Mi enfoque está centrado en la innovación, la seguridad y la alineación de las estrategias tecnológicas con los objetivos comerciales de la empresa.",
                "picture" => asset('images/agentes/AA.png')
            ],
            [
                "nombre" => "Alex<br>Rojas",
                "puesto" => "UXUI<br>CONSULTANT",
                "info" => "Consultor externo trabajando de la mano con Terrazon, aportando más de 6 años de experiencia en diseño UX/UI. Me especializo en crear interfaces intuitivas y funcionales que mejoran la experiencia del usuario y maximizan los resultados para la marca. Trabajo de cerca con el equipo de Terrazon para asegurar que mis soluciones se alineen con sus objetivos estratégicos y las necesidades del mercado inmobiliario.",
                "picture" => asset('images/agentes/AR.png')
            ]
        ];
        return view('public.agentes', [
            'agentes' => $agentes,
        ]);
    }
}
