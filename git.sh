#git add 
git add .
while getopts b:c: flag
do 
    case "${flag}" in
        b) branch="${OPTARG}";;
        c) comment="${OPTARG}";;
    esac
done

#commit
if [ -z $comment ]
then
   git commit -m "updates...."
else 
    git commit -m "${comment}"
fi
#pull
if [ -z $branch ]
then
    git pull origin master
else 
    git pull origin $branch
fi
#push
if [ -z $branch ]
then
    git push origin master
else 
    git push origin $branch
fi