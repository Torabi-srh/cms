var iss26023 = jQuery.noConflict(); 
                    iss26023(document).ready(function () { 
                        iss26023('.box_skitter_large26023').skitter( 
                            { 
                                dots: false,
                                fullscreen: false,
                                label: true,
                                interval: 2600,
                                controls: true,
                                auto_play: true,
                                controls_position: 'center',
                                focus: false,
                                focus_position: 'rightBottom', 
                                navigation: false, 
                                progressbar: false,
                                progressbar_css: {
                                    top: '5px',
                                    left: '90px',
                                    height: 10,
                                    borderRadius: '2px',
                                    width: 200,
                                    backgroundColor: '#000',
                                    opacity: 0.7
                                }, 
                                label: false, 
                                numbers: false, 
                                hideTools: true, 
                                thumbs: false, 
                                velocity: 1, 
                                animation: "random", 
                                numbers_align: 'left', 
                                animateNumberOut: {
                                    backgroundColor: '#333',
                                    color: '#fff'
                                }, 
                                animateNumberOver: {
                                    backgroundColor: '#000',
                                    color: '#fff'
                                }, 
                                animateNumberActive: {
                                    backgroundColor: '#cc3333',
                                    color: '#fff'
                                } 
                            } 
                        ); 
                    });