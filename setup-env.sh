#!/bin/bash

# Script pour créer le fichier .env.example localement
echo "Création du fichier .env.example..."

# Copier le fichier env.example en .env.example
cp env.example .env.example

echo "✅ Fichier .env.example créé avec succès !"
echo "📝 Vous pouvez maintenant personnaliser ce fichier selon vos besoins."
echo "🔧 Pour créer votre fichier .env local : cp .env.example .env" 