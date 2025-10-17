<?php

namespace SettingsPe;

use MapasCulturais\App;
use MapasCulturais\i;
use MapasCulturais\Definitions\Taxonomy;

class Plugin extends \MapasCulturais\Plugin
{
    function __construct($config = []) 
    {
        $config += [
            'field_sub_area_principal' => "",
            'field_area_principal' => "",
        ];

        parent::__construct($config);
    }


    public function _init()
    {
 
        $app = App::i();
        
        $app->view->enqueueStyle("app","settins-pe","css/settins-pe.css");
        $app->view->enqueueStyle("app","cadunico","css/cadunico/cadunico.css");
        
        $app->hook("template(agent.<<edit|single>>.header-content):after",function() use ($app){
            /** @var Theme $this */
            $this->addTaxonoyTermsToJs("subarea");
            $this->addTaxonoyTermsToJs("tag");
        });

        $app->hook('view.partial(widget-tags).params', function ($data, &$template) {
            if($this->controller->id == "agent"){
                $template = "widget-tags-pe";
            }
        });

        $config = $this->config;

        $app->hook('template(site.index.home-search-form):before', function () use($config){
            $this->part('home-search--images', ['config' => $config]);
        });

        $app->hook("app.register:after", function() {
            if($this->subsite && isset($this->config['museus.subsiteId']) && $this->subsite->id == $this->config['museus.subsiteId']){
                $metadata = $this->getRegisteredMetadata('MapasCulturais\Entities\Space');
                $metadata['capacidade']->config['label'] = i::__('O museu possui capacidade para ( XX ) pessoas');
                $metadata['horario']->config['label'] = i::__('Insira cada dia da semana em uma linha');
            }
        });    
    }

    public function register()
    {
        $app = App::i();
        $app->registerController('pesettings', Controller::class);

        $this->registerTaxonomies();

        $this->registerAgentMetadata("CPC", [
            "private" => false,
            "label" => "Cadastro de Produtor Cultural - CPC",
            "type" => "string",
            "available_for_opportunities" => true,
        ]);

        $this->registerAgentMetadata("areaprincipal", [
            "private" => false,
            "label" => "Área de atuação principal",
            "type" => "select",
            "restrictedTerms" => [
                i::__('Artes Circenses'),
                i::__('Antropologia'),
                i::__('Arqueologia'),
                i::__('Arquitetura-Urbanismo'),
                i::__('Arquivo'),
                i::__('Arte de Rua'),
                i::__('Arte Digital'),
                i::__('Artes Visuais'),
                i::__('Artesanato'),
                i::__('Audiovisual'),
                i::__('Cinema'),
                i::__('Circo'),
                i::__('Comunicação'),
                i::__('Cultura Cigana'),
                i::__('Cultura Digital'),
                i::__('Cultura Estrangeira (imigrantes)'),
                i::__('Cultura Indígena'),
                i::__('Cultura LGBT'),
                i::__('Cultura Negra'),
                i::__('Cultura Popular'),
                i::__('Dança'),
                i::__('Design'),
                i::__('Direito Autoral'),
                i::__('Economia Criativa'),
                i::__('Educação'),
                i::__('Esporte'),
                i::__('Filosofia'),
                i::__('Fotografia'),
                i::__('Gastronomia'),
                i::__('Gestão Cultural'),
                i::__('História'),
                i::__('Jogos Eletrônicos'),
                i::__('Jornalismo'),
                i::__('Leitura'),
                i::__('Literatura'),
                i::__('Livro'),
                i::__('Meio Ambiente'),
                i::__('Mídias Sociais'),
                i::__('Moda'),
                i::__('Museu'),
                i::__('Música'),
                i::__('Novas Mídias'),
                i::__('Ópera'),
                i::__('Patrimônio Cultural'),
                i::__('Patrimônio Imaterial'),
                i::__('Patrimônio Material'),
                i::__('Pesquisa'),
                i::__('Produção Cultural'),
                i::__('Rádio'),
                i::__('Saúde'),
                i::__('Sociologia'),
                i::__('Teatro'),
                i::__('Televisão'),
                i::__('Turismo'),
                i::__('Outros'),
            ],
            "available_for_opportunities" => true,
        ]);

        $this->registerAgentMetadata("subareaprincipal", [
            "private" => false,
            "label" => "Sub-área de atuação principal",
            "type" => "select",
            "restrictedTerms" => [
                i::__('Aboio'),
                i::__('Acorda Povo'),
                i::__('Afoxé'),
                i::__('Arte em Barro'),
                i::__('Arte em Bijuterias E Jóias Artesanais'),
                i::__('Arte em Cerâmica'),
                i::__('Arte em Couro'),
                i::__('Arte em Fibras Naturais'),
                i::__('Arte em Fios E Rendas'),
                i::__('Arte em Madeira'),
                i::__('Arte em Materiais Recicláveis'),
                i::__('Arte em Metais'),
                i::__('Arte em Papel'),
                i::__('Arte em Trabalhos Manuais'),
                i::__('Arte em Vidro'),
                i::__('Arte Têxtil'),
                i::__('Arte Visual Abstrata'),
                i::__('Arte Visual Decorativa'),
                i::__('Arte Visual Não-Objetiva'),
                i::__('Arte Visual Representacional'),
                i::__('Artes Comerciais'),
                i::__('Artes Visuais'),
                i::__('Artesanato'),
                i::__('Audiovisual'),
                i::__('Bacamarte'),
                i::__('Ballet Clássico'),
                i::__('Banda de Pífanos'),
                i::__('Bandeira De São João'),
                i::__('Belas Artes'),
                i::__('Bloco de Samba'),
                i::__('Bloco Lírico'),
                i::__('Bloco Rural'),
                i::__('Boi e Similares'),
                i::__('Cabaret'),
                i::__('Caboclinhos'),
                i::__('Cadeia Criativa'),
                i::__('Cadeia Distributiva'),
                i::__('Cadeia Mediadora'),
                i::__('Cadeia Produtiva'),
                i::__('Caiporas, Caretas, Clowns e Papangus'),
                i::__('Cambinda'),
                i::__('Capoeira'),
                i::__('Cavalhada'),
                i::__('Cavalo Marinho'),
                i::__('Chegança'),
                i::__('Ciranda'),
                i::__('Circo'),
                i::__('Circo Itinerante'),
                i::__('Circo Social'),
                i::__('Clube de Alegorias'),
                i::__('Clube de Bonecos'),
                i::__('Clube de Frevo'),
                i::__('Coco'),
                i::__('Coletivo/Grupo/Trupe de Circo'),
                i::__('Companhia de Circo'),
                i::__('Cultura Popular'),
                i::__('Dança'),
                i::__('Dança Afro-brasileira'),
                i::__('Dança Contemporânea'),
                i::__('Dança de Salão'),
                i::__('Dança Popular'),
                i::__('Dança Urbana'),
                i::__('Danças Étnicas'),
                i::__('Design'),
                i::__('Design Automobilístico'),
                i::__('Design da Informação'),
                i::__('Design de Embalagen'),
                i::__('Design de Interiores'),
                i::__('Design de Mobiliário'),
                i::__('Design de Moda'),
                i::__('Design de Produto'),
                i::__('Design de Superfície'),
                i::__('Design Gráfico'),
                i::__('Ecodesign ou Design Sustentável'),
                i::__('Entidade de Circo'),
                i::__('Ergonomia'),
                i::__('Escola De Samba'),
                i::__('Espaço de Formação de Circo'),
                i::__('Fandango'),
                i::__('Forró Pé-De-Serra'),
                i::__('Fotografia'),
                i::__('Fotografia Aérea'),
                i::__('Fotografia Subaquática'),
                i::__('Fotografia Terrestre/Geral'),
                i::__('Gastronomia'),
                i::__('Grupo de Máscaras, Mascarados ou Similares'),
                i::__('Grupo Percussivo'),
                i::__('Guerreiro'),
                i::__('Jazz'),
                i::__('Lapinha/Presépio'),
                i::__('Literatura'),
                i::__('Mamulengo'),
                i::__('Maracatu De Baque Solto'),
                i::__('Maracatu Nação'),
                i::__('Marujada'),
                i::__('Mazurca'),
                i::__('Monólogos'),
                i::__('Motion Design'),
                i::__('Multilinguagem'),
                i::__('Música'),
                i::__('Não se Aplica'),
                i::__('Nau Catarineta'),
                i::__('Outros'),
                i::__('Pastoril Profano'),
                i::__('Pastoril Religioso'),
                i::__('Perfomance'),
                i::__('Programação Visual'),
                i::__('Quadrilha Junina'),
                i::__('Queima Da Lapinha'),
                i::__('Reisado'),
                i::__('Repente e Embolada'),
                i::__('Representação Tridimensional'),
                i::__('São Gonçalo'),
                i::__('Sapateado'),
                i::__('Stand Up Comedy'),
                i::__('Teatro Adulto'),
                i::__('Teatro Amador'),
                i::__('Teatro de Bonecos'),
                i::__('Teatro de Formas Animadas'),
                i::__('Teatro de Rua'),
                i::__('Teatro Musical'),
                i::__('Teatro para Infância'),
                i::__('Teatro Popular'),
                i::__('Tipografia'),
                i::__('Tribo de Índios'),
                i::__('Troça Carnavalesca'),
                i::__('UI Design'),
                i::__('Urso'),
                i::__('UX Design'),
                i::__('Video-dança'),
                i::__('Viola'),
                i::__('Webdesign'),
                i::__('Xaxado'),
            ],
            "available_for_opportunities" => true,
        ]);
    }

    public function registerTaxonomies()
    {
        $app = App::i();
        $taxonomies = [
            'subarea' => [
                'entity' => 'MapasCulturais\Entities\Agent',
                'description' => 'Subárea de atuação',
                'restrictedTerms' => [
                    i::__("Aboio"),
                    i::__("Acorda Povo"),
                    i::__("Afoxé"),
                    i::__("Arte em Barro"),
                    i::__("Arte em Bijuterias E Jóias Artesanais"),
                    i::__("Arte em Cerâmica"),
                    i::__("Arte em Couro"),
                    i::__("Arte em Fibras Naturais"),
                    i::__("Arte em Fios E Rendas"),
                    i::__("Arte em Madeira"),
                    i::__("Arte em Materiais Recicláveis"),
                    i::__("Arte em Metais"),
                    i::__("Arte em Papel"),
                    i::__("Arte em Trabalhos Manuais"),
                    i::__("Arte em Vidro"),
                    i::__("Arte Têxtil"),
                    i::__("Arte Visual Abstrata"),
                    i::__("Arte Visual Decorativa"),
                    i::__("Arte Visual Não-Objetiva"),
                    i::__("Arte Visual Representacional"),
                    i::__("Artes Comerciais"),
                    i::__("Artes Visuais"),
                    i::__("Artesanato"),
                    i::__("Audiovisual"),
                    i::__("Bacamarte"),
                    i::__("Ballet Clássico"),
                    i::__("Banda de Pífanos"),
                    i::__("Bandeira De São João"),
                    i::__("Belas Artes"),
                    i::__("Bloco de Samba"),
                    i::__("Bloco Lírico"),
                    i::__("Bloco Rural"),
                    i::__("Boi e Similares"),
                    i::__("Cabaret"),
                    i::__("Caboclinhos"),
                    i::__("Cadeia Criativa"),
                    i::__("Cadeia Distributiva"),
                    i::__("Cadeia Mediadora"),
                    i::__("Cadeia Produtiva"),
                    i::__("Caiporas, Caretas, Clowns e Papangus"),
                    i::__("Cambinda"),
                    i::__("Capoeira"),
                    i::__("Cavalhada"),
                    i::__("Cavalo Marinho"),
                    i::__("Chegança"),
                    i::__("Ciranda"),
                    i::__("Circo"),
                    i::__("Circo Itinerante"),
                    i::__("Circo Social"),
                    i::__("Clube de Alegorias"),
                    i::__("Clube de Bonecos"),
                    i::__("Clube de Frevo"),
                    i::__("Coco"),
                    i::__("Coletivo/Grupo/Trupe de Circo"),
                    i::__("Companhia de Circo"),
                    i::__("Cultura Popular"),
                    i::__("Dança"),
                    i::__("Dança Afro-brasileira"),
                    i::__("Dança Contemporânea"),
                    i::__("Dança de Salão"),
                    i::__("Dança Popular"),
                    i::__("Dança Urbana"),
                    i::__("Danças Étnicas"),
                    i::__("Design"),
                    i::__("Design Automobilístico"),
                    i::__("Design da Informação"),
                    i::__("Design de Embalagen"),
                    i::__("Design de Interiores"),
                    i::__("Design de Mobiliário"),
                    i::__("Design de Moda"),
                    i::__("Design de Produto"),
                    i::__("Design de Superfície"),
                    i::__("Design Gráfico"),
                    i::__("Ecodesign ou Design Sustentável"),
                    i::__("Entidade de Circo"),
                    i::__("Ergonomia"),
                    i::__("Escola De Samba"),
                    i::__("Espaço de Formação de Circo"),
                    i::__("Fandango"),
                    i::__("Forró Pé-De-Serra"),
                    i::__("Fotografia"),
                    i::__("Fotografia Aérea"),
                    i::__("Fotografia Subaquática"),
                    i::__("Fotografia Terrestre/Geral"),
                    i::__("Gastronomia"),
                    i::__("Grupo de Máscaras, Mascarados ou Similares"),
                    i::__("Grupo Percussivo"),
                    i::__("Guerreiro"),
                    i::__("Jazz"),
                    i::__("Lapinha/Presépio"),
                    i::__("Literatura"),
                    i::__("Mamulengo"),
                    i::__("Maracatu De Baque Solto"),
                    i::__("Maracatu Nação"),
                    i::__("Marujada"),
                    i::__("Mazurca"),
                    i::__("Monólogos"),
                    i::__("Motion Design"),
                    i::__("Multilinguagem"),
                    i::__("Música"),
                    i::__("Não se Aplica"),
                    i::__("Nau Catarineta"),
                    i::__("Outros"),
                    i::__("Pastoril Profano"),
                    i::__("Pastoril Religioso"),
                    i::__("Perfomance"),
                    i::__("Programação Visual"),
                    i::__("Quadrilha Junina"),
                    i::__("Queima Da Lapinha"),
                    i::__("Reisado"),
                    i::__("Repente e Embolada"),
                    i::__("Representação Tridimensional"),
                    i::__("São Gonçalo"),
                    i::__("Sapateado"),
                    i::__("Stand Up Comedy"),
                    i::__("Teatro Adulto"),
                    i::__("Teatro Amador"),
                    i::__("Teatro de Bonecos"),
                    i::__("Teatro de Formas Animadas"),
                    i::__("Teatro de Rua"),
                    i::__("Teatro Musical"),
                    i::__("Teatro para Infância"),
                    i::__("Teatro Popular"),
                    i::__("Tipografia"),
                    i::__("Tribo de Índios"),
                    i::__("Troça Carnavalesca"),
                    i::__("UI Design"),
                    i::__("Urso"),
                    i::__("UX Design"),
                    i::__("Video-dança"),
                    i::__("Viola"),
                    i::__("Webdesign"),
                    i::__("Xaxado"),
                ],
                'required' => \MapasCulturais\i::__('Subárea de atuação é um campo obrigatório.'),
            ],
        ];

        $id = 21;

        foreach ($taxonomies as $slug => $values) {
            $id++;
            $def = new \MapasCulturais\Definitions\Taxonomy($id, $slug, $values['description'],$values['restrictedTerms'],$values['required']);
            $app->registerTaxonomy($values['entity'], $def);
        }
        
    }
}
