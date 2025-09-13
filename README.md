# G-Scores

G-Scores is a student score management system built with Laravel. It allows users to check scores by registration number, generate reports by score level, view statistics by subjects (charts), and list the top 10 students in Group A. The project includes seed data and can be run using Docker.

## 🌐 Demo online

You can access the live demo of G-Scores at: [https://g-scores-hd67.onrender.com/](https://g-scores-hd67.onrender.com/)

## 🚀 Main Features

1. Check scores by registration number – Users can enter a student's registration number to view their scores for each subject.

2. Score report by levels – Students are categorized into four levels:

    - ≥ 8: Excellent
    - 8 > score ≥ 6: Good
    - 6 > score ≥ 4: Average
    - < 4: Poor

3. Statistics by subjects – Charts showing the number of students in each score level for Math, Physics, and Chemistry.

4. Top 10 students in Group A – Lists the top 10 students with the highest total scores in Math, Physics, and Chemistry.

## 🛠️ System Requirements

Before running the application, make sure your system has:

-   Docker & Docker Compose
-   PHP >= 8.1
-   Composer
-   PostgreSQL

## 📥 Installation and Running Locally

1. Clone the repository:

```bash
git clone https://github.com/Huchuynh/G-Scores.git
cd G-Scores
```

2. Copy the example environment file:

```bash
cp .env.example .env
```

3. Build and start Docker containers:

```bash
docker-compose up -d --build
```

4. Create a database and run migrations with seed data (StudentsSeeder):

```bash
docker-compose exec app php artisan migrate --force
docker-compose exec app php artisan db:seed --class=StudentsSeeder --force
```

5. Access the application in your web browser at `http://localhost:8000`.
