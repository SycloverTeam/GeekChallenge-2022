FROM openstax/selenium-chrome

WORKDIR /var/xssbot/

# 复制文件和目录
COPY ./xssbot.py /var/xssbot/
COPY ./run.sh /

# 安装requests
RUN pip install requests -i https://pypi.tuna.tsinghua.edu.cn/simple 
RUN pip install selenium -i https://pypi.tuna.tsinghua.edu.cn/simple
RUN sudo chmod +x /run.sh

# 运行xssbot
CMD python /var/xssbot/xssbot.py