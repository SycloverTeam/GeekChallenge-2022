var express = require('express');
var session = require('express-session');
var bodyParser = require('body-parser');
var crypto = require('crypto');
var path = require('path');


var app = express();

global.save={}

app.use(express.static(path.join(__dirname, 'public')))
var v1 = express.Router();
v1.use(express.json());
v1.use(bodyParser.urlencoded({ extended: true }));
app.use('/v1',v1)

v1.use(session({
    resave: true,
    saveUninitialized: true,
    secret: 'u_dont_kno1w',
    duration: 30 * 60 * 1000,
    activeDuration: 5 * 60 * 1000,
    }))

app.use(express.json());
app.use(bodyParser.urlencoded({ extended: true }));

function requireLogin (req, res, next) {
    console.log(req.session);
    if (!req.session.user) {
        res.send('needlogin');
    } else {
        next();
    }
};
function merge(a, b) {
    for (var attr in b) {
        
        if (typeof(a[attr]) ==  "object"&& typeof(b[attr])== "object") {
            merge(a[attr], b[attr]);
        } else {
            a[attr] = b[attr];
        }
    }
    console.log(a)
    return a
}

app.get('/',function(req,res){
    res.sendFile(path.join(__dirname,'public/main.html'));
})

app.get('/login',function(req,res){
    res.sendFile(path.join(__dirname,'public/login.html'));
})

app.get('/logout',function(req,res){
    res.sendFile(path.join(__dirname,'public/logout.html'));
})

app.get('/relief',function(req,res){
    res.sendFile(path.join(__dirname,'public/relief.html'));
})

app.get('/play',function(req,res){
    res.sendFile(path.join(__dirname,'public/play.html'));
})

app.get('/flag',function(req,res){
    res.sendFile(path.join(__dirname,'public/flag.html'));
})

app.get('/import',function(req,res){
    res.sendFile(path.join(__dirname,'public/import.html'));
})

app.get('/export',function(req,res){
    res.sendFile(path.join(__dirname,'public/export.html'));
})


v1.get('/',requireLogin, function (req, res) {
    for (let i in Object.keys(global.save)){
        if(Object.keys(global.save)[i] == req.session.user)
            {req.session.coin=global.save[req.session.user];
            
    }}
    return res.send(String(req.session.coin));
})

v1.post('/relief',requireLogin,function(req,res){
    //return res.send("now u have "+req.session.aa);
    for (let i in Object.keys(global.save)){
        if(Object.keys(global.save)[i] == req.session.user)
            {req.session.coin=global.save[req.session.user];
            }
    }
    if(!req.session.coin)
    {
        req.session.coin = 0;
    }
    if(req.session.coin >= 100){
        return res.send("nono 低保是为了有需求的人");
    }
    
    var body = JSON.parse(JSON.stringify(req.body));
    console.log(body);
    if(body){
        if(Number(body['coin']) > 100 && Number(body['coin']) < 200)
        {
            req.session.coin += Number(body['coin']);
            global.save[req.session.user]=req.session.coin;
        }
        if(req.session.coin < 100){
            return res.send("input nomber of coin more than 100 and less than 200 to get");
        }
            return res.send("now u have "+req.session.coin);
    }
    return res.send("input nomber of coin more than 100 and less than 200 to get");
})


v1.post('/login',function(req,res){
    if(req.session.user){
        return res.send("logined");
    }
    var body = JSON.parse(JSON.stringify(req.body));
    req.session.user = body['name'];
    return res.send("创建成功"+req.session.user);
});

v1.get('/login',function(req,res){
    return res.send("post name to create account eg: {'name':'admin'} and use json");
});

v1.get('/play', requireLogin, function(req, res) {
    for (let i in Object.keys(global.save)){
        if(Object.keys(global.save)[i] == req.session.user)
            {
                req.session.coin=global.save[req.session.user];
            }
    }

    if(req.session.coin < 100 || typeof(req.session.coin) == "undefined"){
        return res.json("去/relief领低保吧");
    }
    var flag=Math.random();
    if (Math.random() <0.5){
        flag=Math.random()*-1;
    }

    if (req.session.coin > 9000)
    {
        flag=-1;
    }
    var c_coin=flag*100;
    req.session.coin+=c_coin;
    global.save[req.session.user]=req.session.coin;
    return res.json("now you get "+c_coin+" your account has "+req.session.coin);
});

v1.get('/export',requireLogin,function(req,res){
    for (let i in Object.keys(global.save)){
        if(Object.keys(global.save)[i] == req.session.user)
            {req.session.coin=global.save[req.session.user];
            }
    }
    var md5 = crypto.createHash('md5');
    var hcode= md5.update(req.session.user+req.session.coin+"hashkey2222222222222222222442").digest("hex");
    var sessionObj = JSON.parse(JSON.stringify(req.session));
    delete sessionObj.cookie;
    sessionObj["hashcode"]=hcode;
    return res.json(sessionObj);
});

v1.post('/import',function(req,res){
    var data = req.body;
    if(!data['user']||! String(data['coin'])||!data['hashcode']){
        return res.json('error your save is broken,lose some part of save')
    }
    var md5 = crypto.createHash('md5');
    var hcode= md5.update(data['user']+String(data['coin'])+"hashkey2222222222222222222442").digest("hex");
    if (hcode != data['hashcode'])
        return res.json("nononono, you are cheating me");
    if(Number(data["coin"]) > 9000)
    {
        return res.json("NO NO you are cheating");
    }
    
    req.session  = merge(req.session,data);
    
    req.session.coin=data['coin'];
    
    for (let i in Object.keys(global.save)){
        if(Object.keys(global.save)[i] == req.session.user)
            {
                req.session.coin=data['coin'];
                global.save[req.session.user]=req.session.coin;
            }
    }
    console.log(req.session,55)
    return res.json("load successy");
});

v1.get('/flag',requireLogin,function(req,res){
    
    for (let i in Object.keys(global.save)){
        if(Object.keys(global.save)[i] == req.session.user)
            {req.session.coin=global.save[req.session.user];
            }
    }
    
    if(req.session.coin >= 10000){
        return res.send("SYC{finall_Answer_is_42}");
    }
    else{
        return res.send("NONONO,you need 10000 coins to get flag");
    }
});

v1.get('/logout', function(req, res) {
    req.session.destroy();
    res.redirect('/');
    });


var server = app.listen(80, function () {

    var host = server.address().address
    var port = server.address().port

    

})