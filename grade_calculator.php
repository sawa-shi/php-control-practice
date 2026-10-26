<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>成績判定システム</title>
</head>
<body>
    <h1>成績判定システム</h1>
    <h2>【個別成績】</h2>
    <?php
    //評価の定義
    $students = [
        ["name" => "田中太郎", "score" => 85],
        ["name" => "佐藤花子", "score" => 92],
        ["name" => "鈴木一郎", "score" => 78],
        ["name" => "高橋美咲", "score" => 65],
        ["name" => "伊藤健太", "score" => 58],
    ];
    
    //1人ずつ判定（ループ）
    foreach ($students as $student){
        $name = $student["name"];
        $score = $student["score"];
        
        //条件の判定
        if ($score >= 90) {
             $grade = "A";
             $status = "優秀";
        } elseif ($score >= 80) {
             $grade = "B";
             $status = "良好";
        } elseif ($score >= 70) {
             $grade = "C";
             $status = "普通";
        } elseif ($score >= 60) {
             $grade = "D";
             $status = "要努力";
        } else {
             $grade = "F";
             $status = "不合格";
        }

        //表示
        echo "{$name}: {$score}点 - 評価{$grade} ({$status})<br>";
    }
    ?>
    
    <h2>【統計情報】</h2>
    
    <?php
    //統計の初期化
    $pass_count = 0;
    $fail_count = 0;
    $total_score = 0;

    //合計
    foreach ($students as $student){
        $score = $student["score"];
        $total_score += $score;
    }

    //合格者の条件
    foreach ($students as $student){
        $score = $student["score"];

        if ($score >=60){
            $pass_count++;
        } else {
            $fail_count++;
        }
    }

    //平均点
    $student_count = count($students);
    $average_score = $total_score / $student_count;

    //表示
    echo "合格者数（60点以上）: {$pass_count}人<br>";
    echo "不合格者数（60点未満）： {$fail_count}人<br>";
    echo "平均点： {$average_score}点<br>";
    ?>

</body>
</html>