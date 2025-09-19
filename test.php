<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Contact</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            max-width: 500px;
            width: 100%;
        }

        .form-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }

        .form-header h1 {
            font-size: 2.2em;
            margin-bottom: 10px;
        }

        .form-header p {
            opacity: 0.9;
            font-size: 1.1em;
        }

        .form-content {
            padding: 40px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 600;
            font-size: 0.95em;
        }

        .form-control {
            width: 100%;
            padding: 15px;
            border: 2px solid #e1e1e1;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
            background-color: #f8f9fa;
        }

        .form-control:focus {
            outline: none;
            border-color: #667eea;
            background-color: white;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        .btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
        }

        .btn:active {
            transform: translateY(0);
        }

        .alert {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .alert-success {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }

        .alert-error {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }

        .error {
            border-color: #dc3545 !important;
            background-color: #fff5f5 !important;
        }

        .error-message {
            color: #dc3545;
            font-size: 0.875em;
            margin-top: 5px;
            font-weight: 500;
        }

        .required {
            color: #dc3545;
        }

        @media (max-width: 480px) {
            .container {
                margin: 10px;
            }
            
            .form-content {
                padding: 25px;
            }
            
            .form-header {
                padding: 25px;
            }
            
            .form-header h1 {
                font-size: 1.8em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-header">
            <h1>Contact</h1>
            <p>Envoyez-nous votre message</p>
        </div>
        
        <div class="form-content">
            <?php
            // Variables pour les messages et données
            $message = '';
            $messageType = '';
            $errors = [];
            $formData = [
                'nom' => '',
                'email' => '',
                'sujet' => '',
                'message' => ''
            ];

            // Traitement du formulaire
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupération et nettoyage des données
                $formData['nom'] = trim($_POST['nom'] ?? '');
                $formData['email'] = trim($_POST['email'] ?? '');
                $formData['sujet'] = trim($_POST['sujet'] ?? '');
                $formData['message'] = trim($_POST['message'] ?? '');

                // Validation
                if (empty($formData['nom'])) {
                    $errors['nom'] = 'Le nom est obligatoire';
                } elseif (strlen($formData['nom']) < 2) {
                    $errors['nom'] = 'Le nom doit contenir au moins 2 caractères';
                }

                if (empty($formData['email'])) {
                    $errors['email'] = 'L\'email est obligatoire';
                } elseif (!filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
                    $errors['email'] = 'Format d\'email invalide';
                }

                if (empty($formData['sujet'])) {
                    $errors['sujet'] = 'Le sujet est obligatoire';
                } elseif (strlen($formData['sujet']) < 5) {
                    $errors['sujet'] = 'Le sujet doit contenir au moins 5 caractères';
                }

                if (empty($formData['message'])) {
                    $errors['message'] = 'Le message est obligatoire';
                } elseif (strlen($formData['message']) < 10) {
                    $errors['message'] = 'Le message doit contenir au moins 10 caractères';
                }

                // Si pas d'erreurs, traiter le formulaire
                if (empty($errors)) {
                    // Ici vous pourriez :
                    // - Envoyer un email
                    // - Sauvegarder en base de données
                    // - Etc.
                    
                    // Simulation du traitement
                    $success = true; // Simuler le succès
                    
                    if ($success) {
                        $message = 'Votre message a été envoyé avec succès ! Nous vous répondrons dans les plus brefs délais.';
                        $messageType = 'success';
                        
                        // Réinitialiser le formulaire
                        $formData = ['nom' => '', 'email' => '', 'sujet' => '', 'message' => ''];
                    } else {
                        $message = 'Une erreur est survenue lors de l\'envoi. Veuillez réessayer.';
                        $messageType = 'error';
                    }
                } else {
                    $message = 'Veuillez corriger les erreurs ci-dessous.';
                    $messageType = 'error';
                }
            }

            // Fonction pour afficher les classes d'erreur
            function getFieldClass($fieldName, $errors) {
                return isset($errors[$fieldName]) ? 'form-control error' : 'form-control';
            }
            
            // Fonction pour échapper les données de sortie
            function h($string) {
                return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
            }
            ?>

            <?php if ($message): ?>
                <div class="alert alert-<?php echo $messageType; ?>">
                    <?php echo h($message); ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo h($_SERVER['PHP_SELF']); ?>" novalidate>
                <div class="form-group">
                    <label for="nom">
                        Nom complet <span class="required">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="nom" 
                        name="nom" 
                        class="<?php echo getFieldClass('nom', $errors); ?>"
                        value="<?php echo h($formData['nom']); ?>"
                        placeholder="Votre nom complet"
                    >
                    <?php if (isset($errors['nom'])): ?>
                        <div class="error-message"><?php echo h($errors['nom']); ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="email">
                        Email <span class="required">*</span>
                    </label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="<?php echo getFieldClass('email', $errors); ?>"
                        value="<?php echo h($formData['email']); ?>"
                        placeholder="votre@email.com"
                    >
                    <?php if (isset($errors['email'])): ?>
                        <div class="error-message"><?php echo h($errors['email']); ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="sujet">
                        Sujet <span class="required">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="sujet" 
                        name="sujet" 
                        class="<?php echo getFieldClass('sujet', $errors); ?>"
                        value="<?php echo h($formData['sujet']); ?>"
                        placeholder="Sujet de votre message"
                    >
                    <?php if (isset($errors['sujet'])): ?>
                        <div class="error-message"><?php echo h($errors['sujet']); ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="message">
                        Message <span class="required">*</span>
                    </label>
                    <textarea 
                        id="message" 
                        name="message" 
                        class="<?php echo getFieldClass('message', $errors); ?>"
                        placeholder="Écrivez votre message ici..."
                    ><?php echo h($formData['message']); ?></textarea>
                    <?php if (isset($errors['message'])): ?>
                        <div class="error-message"><?php echo h($errors['message']); ?></div>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn">
                    Envoyer le message
                </button>
            </form>
        </div>
    </div>

    <script>
        // Amélioration UX : suppression des erreurs lors de la saisie
        document.querySelectorAll('.form-control').forEach(function(input) {
            input.addEventListener('input', function() {
                if (this.classList.contains('error')) {
                    this.classList.remove('error');
                    const errorMsg = this.parentNode.querySelector('.error-message');
                    if (errorMsg) {
                        errorMsg.style.display = 'none';
                    }
                }
            });
        });

        // Animation d'envoi du formulaire
        document.querySelector('form').addEventListener('submit', function(e) {
            const btn = document.querySelector('.btn');
            btn.innerHTML = 'Envoi en cours...';
            btn.disabled = true;
        });
    </script>
</body>
</html><?php
